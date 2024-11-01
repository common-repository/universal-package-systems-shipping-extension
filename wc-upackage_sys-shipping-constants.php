<?php

if ( ! defined( 'WPINC' ) ) {
	die();
}

if (!defined('WC_UPACKAGE_SYS__SHIPPING_VERSION')) {
	define( 'WC_UPACKAGE_SYS__SHIPPING_VERSION', '1.1.0' );
}

if (!defined('WC_UPACKAGE_SYS__SHIPPING_URL')) {
    define('WC_UPACKAGE_SYS__SHIPPING_URL', plugin_dir_url(__FILE__));
}
if (!defined('WC_UPACKAGE_SYS__SHIPPING_DIR')) {
    define('WC_UPACKAGE_SYS__SHIPPING_DIR', dirname(__FILE__));
}
if (!defined('WC_UPACKAGE_SYS__SHIPPING_DIR_PATH')) {
    define('WC_UPACKAGE_SYS__SHIPPING_DIR_PATH', plugin_dir_path(__FILE__));
}
if (!defined('WC_UPACKAGE_SYS__SHIPPING_BASENAME')) {
    define('WC_UPACKAGE_SYS__SHIPPING_BASENAME', plugin_basename(__FILE__));
}
if (!defined('WC_UPACKAGE_SYS__SHIPPING_NAME')) {
    define('WC_UPACKAGE_SYS__SHIPPING_NAME', 'Universal Package Systems Shipping Extension For WooCommerce');
}
if (!defined('WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN')) {
    define('WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN', 'wc-upackage_sys-shipping');
}

if(!defined('WC_UPACKAGE_SYS__SHIPPING_SETTINGS')) {
	define('WC_UPACKAGE_SYS__SHIPPING_SETTINGS', "woocommerce_" . WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN . "_settings");
}

if(!defined('WC_UPACKAGE_SYS__SHIPPING_ADDRESS_SETTINGS')) {
	define('WC_UPACKAGE_SYS__SHIPPING_ADDRESS_SETTINGS', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN . "_address_settings");
}

if(!defined('WC_UPACKAGE_SYS__SHIPPING_SERVICE_AREAS_SETTINGS')) {
	define('WC_UPACKAGE_SYS__SHIPPING_SERVICE_AREAS_SETTINGS', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN . "_service_area_settings");
}
