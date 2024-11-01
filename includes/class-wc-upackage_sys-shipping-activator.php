<?php

/**
 * Fired during plugin activation
 *
 * @link       http://kendallarneaud.me
 * @since      1.0.0
 *
 * @package    Wc_UPSys_Local_Delivery_Shipping
 * @subpackage Wc_UPSys_Local_Delivery_Shipping/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wc_UPSys_Local_Delivery_Shipping
 * @subpackage Wc_UPSys_Local_Delivery_Shipping/includes
 * @author     Kendall ARneaud <info@kendallarneaud.me>
 */
class Wc_UPSys_Local_Delivery_Shipping_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		Wc_UPSys_Local_Delivery_Shipping_Activator::wc_upackage_sys_shipping_activation_check();
	}

	public static function wc_upackage_sys_shipping_activation_check(){
		if ( ! function_exists( 'curl_init' ) ) {
	        deactivate_plugins( basename( __FILE__ ) );
	        wp_die( 'Sorry, but you cannot run this plugin, it requires the <a href="https://www.php.net/manual/en/book.curl.php">cURL</a> support on your server/hosting to function.' );
		}
	}

}
