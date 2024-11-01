<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://kendallarneaud.me
 * @since      1.0.0
 *
 * @package    Wc_UPSys_Local_Delivery_Shipping
 * @subpackage Wc_UPSys_Local_Delivery_Shipping/public
 */
use UniversalPackageSystems\Endpoint\UpackageSystemServiceAreas;
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wc_UPSys_Local_Delivery_Shipping
 * @subpackage Wc_UPSys_Local_Delivery_Shipping/public
 * @author     Kendall ARneaud <info@kendallarneaud.me>
 */
class Wc_UPSys_Local_Delivery_Shipping_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		require_once 'partials/wc-upackage_sys-shipping-public-display.php';
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_UPSys_Local_Delivery_Shipping_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_UPSys_Local_Delivery_Shipping_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wc-upackage_sys-shipping-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_UPSys_Local_Delivery_Shipping_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_UPSys_Local_Delivery_Shipping_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wc-upackage_sys-shipping-public.js', array( 'jquery' ), $this->version, false );

	}

	public function setup_calculator()
	{
		if(!is_null(WC()->customer) && ( ( WC()->customer->get_shipping_country() ?? WC()->customer->get_billing_country() ) == 'TT')) {
			add_filter('woocommerce_shipping_calculator_enable_city', [$this, 'enable_city_element_markup'], 10);
		}
	}
/**
	 * Require city display select element
	 *
	 * @since    1.0.2
	 */
	public function enable_city_element_markup() {
    	
    	if(!is_enabled()) return true;
    	if(!is_null(WC()->customer) && ( WC()->customer->get_shipping_country() == 'TT')) { 
    		include_once dirname(__FILE__) . '/partials/wc-upackage_sys-shipping-public-display-city_select.php';
    		return false;
        }
    
    	
         
    	return true;
	}


	public function setup_city_input_element_js()
	{
    
    	if(!is_enabled()) return false;
    
    	wp_enqueue_script( $this->plugin_name . '_footer', plugin_dir_url( __FILE__ ) . 'js/wc-upackage_sys-shipping-city-input-element.js', array( 'jquery' ), $this->version, true);
	    wp_add_inline_script($this->plugin_name . '_footer', sprintf("var customer_city = '%s'", (!is_null(WC()->customer) && ( $current_r = WC()->customer->get_shipping_city())) ? $current_r : "null" ), 'before');
    	wp_add_inline_script($this->plugin_name . '_footer', sprintf('var default_city_element = \'<input type="text" class="input-text" value="%s" placeholder="%s" name="{name}" id="{id}" />\'', esc_attr( $current_r ), esc_attr_x( 'City', 'woocommerce' ) ), 'before');

		if(($service_areas = get_service_areas())) wp_add_inline_script( $this->plugin_name . '_footer', sprintf("var ups_service_areas = %s;", json_encode($service_areas)), 'before' );


	}

	function custom_override_state_required( $address_fields ) {
      if(!is_enabled()) return $address_fields;
    
	  $wc = WC();
	  if(is_null($wc->customer)) return $address_fields;

	  $country =  $wc->customer->get_billing_country();
	  if($country == 'TT'){ 
      	if(array_key_exists('billing_state',$address_fields))  $address_fields['billing_state']['required'] = false;
	  }
    
      $country =  $wc->customer->get_shipping_country();
	  if($country == 'TT'){ 
      	if(array_key_exists('shipping_state',$address_fields))  $address_fields['shipping_state']['required'] = false;
	  }
	
	  return $address_fields;
	}

/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.1
	 */

	public function create_shipment($order_id)
			{
    if(!is_enabled()) return false;
					$order = wc_get_order( $order_id );
 		
					if((($order->get_shipping_country() ?? $order->get_billing_country()) === 'TT') && ($order->has_shipping_method(WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN)) ) {
							$weights = [];
							$data  = $order->get_data();
							$desc = $order->get_status();
							$ship_address = array_filter($data['shipping']);
							$billing_address = array_filter($data['billing']);
							$customer = array_merge($billing_address, $ship_address);
							$items = $order->get_items();
							$cod = $order->get_payment_method() == 'cod';
							$note = $order->get_customer_note();
							$note = empty($note) ? 'N/A' : $note;
							$amt = sprintf("%.2f", $order->get_shipping_total());
							foreach ($items as $item) {
									for($i = 0; $i < $item->get_quantity();$i++) array_push($weights, ceil($item->get_product()->get_weight()));
							}
							$ship_to = [
									"ShipToCompanyOrName"=> ($name = sprintf("%s %s", $customer['first_name'],  $customer['last_name']) ),
									"ShipToContact"=> $name,
									"ShipToAddress1"=> $customer['address_1'],
									"ShipToAddress2"=> $customer['address_2'],
									"ShipToPostalCode"=> $customer['postcode'],
									"ShipToCountry"=> 'Trinidad and Tobago',
									"ShipToTownCity"=> $customer['city'],
									"ShipToTelephone"=> $customer['phone'],
									"ShipToAddressType"=>'Residential'
							];

							try {
									$shipment = create_shipment($ship_to, $weights, $amt, $cod, $note, $desc );
									$date = new \DateTime($shipment->date);
									$order->add_order_note(sprintf(
										"<p>Shipment Request #%s has been created for Order #%s on %s. Total pieces: %d. Delievery notes: %s</p>"
										,$shipment->shipmentid
										,$order->get_id()
                                    	,$date->format('l jS F Y')
                                    	,$shipment->totalpieces
										,$shipment->servicenotes
									));
                            		$order->update_meta_data('shipping_id', $shipment->shipmentid);
                            		$order->update_meta_data('shipment_pieces',$shipment->totalpieces);
                            		$order->save();
							} catch(\Exception $e)
							{
									$error = json_decode($e->getMessage());
									wc_add_notice("{$error->meta->code} {$error->meta->message}", 'error');
									WC_Admin_Notices::add_custom_notice( 'order_note', "{$error->meta->code} {$error->meta->message}");
							}
					}
			}
/**
	 * add the tracking information to the order emails
	 *
	 * @since    1.1.0
	 */
	public function add_tracking_info_to_email( $order, $sent_to_admin = true  ) {
    	if(!is_enabled()) return false;
    
    	if($order->has_shipping_method(WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN) ){
       		$order = wc_get_order($order->get_id());	
      		include plugin_dir_path(__FILE__) .  'partials/wc-upackage_sys-shipping-public-order-email-tracking-details.php';
      }
    }
/**
	 * add the tracking information to the thank you page
	 *
	 * @since 1.1.0
	 * */
	public function add_tracking_info_to_thank_you($order) {
    	if(!is_enabled()) return false;
    
    	if($order->has_shipping_method(WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN) ){
        	include plugin_dir_path(__FILE__) . 'partials/wc-upackage_sys-shipping-public-order-tracking-details.php';
        }
    }
}
