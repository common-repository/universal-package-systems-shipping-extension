<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://kendallarneaud.me
 * @since      1.0.0
 *
 * @package    Wc_UPSys_Local_Delivery_Shipping
 * @subpackage Wc_UPSys_Local_Delivery_Shipping/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wc_UPSys_Local_Delivery_Shipping
 * @subpackage Wc_UPSys_Local_Delivery_Shipping/includes
 * @author     Kendall ARneaud <info@kendallarneaud.me>
 */
class Wc_UPSys_Local_Delivery_Shipping {
	protected $wc_upackage_sys_shipping_method;
	protected $wc_upackage_sys_shipping_create_shipment_method;
	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wc_UPSys_Local_Delivery_Shipping_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'WC_UPACKAGE_SYS__SHIPPING_VERSION' ) ) {
			$this->version = WC_UPACKAGE_SYS__SHIPPING_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wc-upackage_sys-shipping';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wc_UPSys_Local_Delivery_Shipping_Loader. Orchestrates the hooks of the plugin.
	 * - Wc_UPSys_Local_Delivery_Shipping_i18n. Defines internationalization functionality.
	 * - Wc_UPSys_Local_Delivery_Shipping_Admin. Defines all hooks for the admin area.
	 * - Wc_UPSys_Local_Delivery_Shipping_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		 require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wc-upackage_sys-shipping-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wc-upackage_sys-shipping-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wc-upackage_sys-shipping-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */


		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wc-upackage_sys-shipping-public.php';



		$this->loader = new Wc_UPSys_Local_Delivery_Shipping_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wc_UPSys_Local_Delivery_Shipping_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Wc_UPSys_Local_Delivery_Shipping_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Wc_UPSys_Local_Delivery_Shipping_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'woocommerce_shipping_init', $this, 'wc_upackage_sys_shipping_init_method');
		$this->loader->add_action( 'woocommerce_shipping_methods', $this, 'wc_upackage_sys_shipping_register_method_class');
		$this->loader->add_filter('plugin_action_links', $plugin_admin, 'link_settings', 10, 3);
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Wc_UPSys_Local_Delivery_Shipping_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
    	$this->loader->add_action('woocommerce_order_status_processing', $plugin_public, 'create_shipment', 1, 1 );
    	$this->loader->add_action('woocommerce_before_shipping_calculator',$plugin_public,'setup_calculator',10);
        $this->loader->add_action( 'woocommerce_after_shipping_calculator' ,$plugin_public,'setup_city_input_element_js',10);
    	
    	$this->loader->add_action('woocommerce_before_checkout_shipping_form',$plugin_public,'setup_calculator',10);
        $this->loader->add_action( 'woocommerce_after_checkout_shipping_form' ,$plugin_public,'setup_city_input_element_js',20);
    	$this->loader->add_filter( 'woocommerce_shipping_fields',$plugin_public,'custom_override_state_required',100000, 1);
   		$this->loader->add_filter( 'woocommerce_billing_fields',$plugin_public,'custom_override_state_required',100000, 1); 
        $this->loader->add_filter( 'woocommerce_checkout_fields' ,$plugin_public,'custom_override_state_required',101000, 1);
    	$this->loader->add_action('woocommerce_email_order_meta', $plugin_public, 'add_tracking_info_to_email', 14, 2 );
    	$this->loader->add_action('woocommerce_order_details_after_order_table', $plugin_public, 'add_tracking_info_to_thank_you', 10, 1);
    
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wc_UPSys_Local_Delivery_Shipping_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	public function wc_upackage_sys_shipping_init_method() {
      require_once WC_UPACKAGE_SYS__SHIPPING_DIR . '/admin/partials/wc-upackage_sys-shipping-init-methods.php';

      $this->wc_upackage_sys_shipping_method = new Wc_UPSys_Local_Delivery_Shipping_Method();
			add_action('woocommerce_update_options_shipping_' . $this->wc_upackage_sys_shipping_method->id, [$this->wc_upackage_sys_shipping_method, 'process_admin_options'],9 );
    		add_action('woocommerce_update_options_shipping_' . $this->wc_upackage_sys_shipping_method->id, [$this->wc_upackage_sys_shipping_method, 'set_ups_options'],10);
			

  }

		/**
     * Add shipping method.
     *
     * Add configured methods to available shipping methods.
     *
     * @since 1.0.0
     */
    public function wc_upackage_sys_shipping_register_method_class($methods) {

        if (class_exists('Wc_UPSys_Local_Delivery_Shipping_Method')) {
            $methods[WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN] = 'Wc_UPSys_Local_Delivery_Shipping_Method';
        }

        return $methods;
    }
}
