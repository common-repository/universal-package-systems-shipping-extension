<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://kendallarneaud.me
 * @since      1.0.0
 *
 * @package    Wc_UPSys_Local_Delivery_Shipping
 * @subpackage Wc_UPSys_Local_Delivery_Shipping/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wc_UPSys_Local_Delivery_Shipping
 * @subpackage Wc_UPSys_Local_Delivery_Shipping/includes
 * @author     Kendall ARneaud <info@kendallarneaud.me>
 */
class Wc_UPSys_Local_Delivery_Shipping_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wc-upackage_sys-shipping',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
