<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://kendallarneaud.me
 * @since             1.0.1
 * @package           Wc_UPSys_Local_Delivery_Shipping
 *
 * @wordpress-plugin
 * Plugin Name:       Universal Package Systems Shipping Extension
 * Plugin URI:        http://www.universalpackagesys.com
 * Description:       Shipping Extension Plugin for WooCommerce. Delivery services for Trinidad and Tobago provided by Universal Package Systems Ltd.
 * Version:           1.1.0
 * Stable:	      	  trunk
 * WC requires at least: 3.7
 * WC tested up to: 4.0
 * Author:            Kendall Arneaud
 * Author URI:        http://kendallarneaud.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-upackage_sys-shipping
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wc-upackage_sys-shipping-activator.php
 */
function activate_wc_upackage_sys_shipping() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc-upackage_sys-shipping-activator.php';
	Wc_UPSys_Local_Delivery_Shipping_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wc-upackage_sys-shipping-deactivator.php
 */
function deactivate_wc_upackage_sys_shipping() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc-upackage_sys-shipping-deactivator.php';
	Wc_UPSys_Local_Delivery_Shipping_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wc_upackage_sys_shipping' );
register_deactivation_hook( __FILE__, 'deactivate_wc_upackage_sys_shipping' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */

require plugin_dir_path( __FILE__ ) . 'wc-upackage_sys-shipping-constants.php';
require plugin_dir_path( __FILE__ ) . 'includes/autoload-wc-upackage_sys.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-wc-upackage_sys-shipping.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wc_upackage_sys_shipping() {
	$plugin = new Wc_UPSys_Local_Delivery_Shipping();
	$plugin->run();
}

run_wc_upackage_sys_shipping();
