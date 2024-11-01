<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
* Class Wc_UPSys_Local_Delivery_Shipping_Method.
*
* WooCommerce Advanced flat rate shipping method class.
*/
if (!class_exists('Wc_UPSys_Local_Delivery_Shipping_Method')) {

    class Wc_UPSys_Local_Delivery_Shipping_Method extends WC_Shipping_Method {

        /**
         * Constructor
         *
         * @since 1.0.0
         */
        public function __construct($instance_id = 0) {
            parent::__construct($instance_id);
            $this->id = WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN;
            $this->method_title = __('Universal Package Systems Shipping', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN);
            $this->title = $this->method_title;
            $this->availability = 'specific';
            $this->countries = array('TT');
            $this->supports = array('settings','shipping-zones');
            $this->method_description = __('Local delivery service in Trinidad and Tobago via Universal Package Systems Shipping', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN);
        	$this->init();
        }
        /**
         * Init
         *
         * @since 1.0.0
         */
        function init() {
            $this->init_form_fields();
            $this->init_settings();
            $this->enabled = isset($this->settings['enabled'])? $this->settings['enabled'] : 'no';
            add_action( 'woocommerce_update_options_shipping_' . $this->id, [$this, 'process_admin_options'],10,1);
        }

        /**
         * Init form fields.
         *
         * @since 1.0.0
         */
        public function init_form_fields() {
            $this->form_fields = [
                'enabled' =>
                    [
                    'title' => __('Enable', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN),
                    'type' => 'checkbox',
                    'default' => 'yes'
                    ],
               'client_id' =>
                    [
                       'title' => __('Client ID', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN),
                       'type' => 'text',
                       'label' => __('Enter your Universal Package Systems client id', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN),
                       'description' => 'Enter the client id provided by Universal Package Systems'
                   ],
                   'test' =>
                       [
                       'title' => __('Enable Test Mode', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN),
                       'type' => 'checkbox',
                       'default' => 'yes'
                       ]
               ];
        }

		public function is_enabled() {
        	return 'yes' == $this->enabled;
        }
        /**
         * Calculate shipping.
         *
         * @since 1.0.0
         *
         * @param array $package List containing all products for this method.
         */
        public function calculate_shipping($package = array()) {
            if( $this->is_available($package) && !empty($package['destination']['city'])) {
                $costs = $package['contents_cost'];
                $city = $package['destination']['city'];
                $weights = [];
                foreach (($contents = $package['contents']) as $key => $product_data) {
                	for($i=0;$i<$product_data['quantity'];$i++) array_push($weights, ceil( $product_data['data']->get_weight()));
                }

                try {
                    $costs = get_shipping_estimates($city, $costs, $weights);
                    $rate = array(
                    	'id'       => $this->id,
                    	'label'    => "Universal Package Systems Shipping Rate( est.)",
                    	'cost'     => array_sum(array_intersect_key($costs, ['shipping_charges'=>0,'cod_surcharges'=>0,'value_surcharge'=>0])),
                    	'calc_tax' => 'per_order'
                    );
                    // Re gister the rate
                    $this->add_rate( $rate );
                } catch (\Exception $e) {
                    $error = json_decode($e->getMessage());
                    wc_add_notice("{$error->meta->code} {$error->meta->message}", 'error');
                }

            }
        }

        private function environment_check() {
      		  global $woocommerce;

        		if ( get_woocommerce_currency() != "TTD" ) {
        			echo '<div class="notice">
        				<p>' . __( 'Universal Package Systems Shipping requires the currency in Trinidad and Tobago Dollars.', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN ) . '</p>
        			</div>';
        		}

        		if ( $woocommerce->countries->get_base_country() != "TT" ) {
        			echo '<div class="error">
        				<p>' . __( 'Universal Package Systems requires that the base country/region is set to Trinidad and Tobago.', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN ) . '</p>
        			</div>';
        		}

    	   }

        public function admin_options() {
		    // Check users environment supports this method
		    $this->environment_check();
            parent::admin_options();
    	}
		
    	/**
     	 * set the ups setting options
    	 *
    	 * @since    1.1.0
    	 */
	
		public function set_ups_options(){
        	set_service_areas();
        	set_addresses();
		}

    }
}
