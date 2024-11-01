=== Universal Package Systems Shipping Extension ===
Plugin Name: Universal Package Systems Shipping Extension
Plugin URI: http://www.univeralpackagesys.com
Author: Kendall Arneaud
Author URI: http://www.kendallarneaud.me
Contributors: icecappacino
Tags: shipping, woocommerce, trinidad, tobago
Requires at least: 4.7
Tested up to: 5.3
Stable tag: trunk
Version: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
WC requires at least: 3.7
WC tested up to: 4.0
Shipping Extension Plugin for WooCommerce. Delivery services for Trinidad and Tobago provided by Universal Package Systems.

== Description ==

The Universal Package Systems Shipping Extension Plugin offers local delivery services for Trinidad and Tobago provided by Universal Package Systems for WooCommerce storefronts. You would be required to register for membership to be able to use the service.

A few notes about:

*   This plugin was developed for a service provided within Trinidad and Tobago ONLY.
*   You would require a customer ID, username and password which can be obtained by registering for membership with Universal Package Systems services.

== System Requirements ==

*   PHP >= 7.0
*   PHP cURL Extension
*   Woocommerce >= 3.3

== Installation ==

Before installation the following requirements for WooCommerce should be met:-

*   WooCommerce general option store location country should be set to Trinidad and Tobago
*   WooCommerce general options selling location(s), sell to specific countries, ship to specific location(s) or ship to specific countries should have Trinidad and Tobago as a value.
*   WooCommerce general option currency option parameter MUST be set to Trinidad and Tobago dollars.
*   ALL PRODUCTS applicable for shipping should have a Weight( lbs). Products submitted for shipping that do not have these parameters set would result in error.

1. Upload `universal-package-systems-shipping-extension` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Navigate to Woocommerce->Settings->Shipping. Click on Universal Package Systems shipping option.
4. Ensure the enabled parameter is checked.
6. Enter the customer ID provided by Universal Package Systems upon registration.
7. Create a shipping zone and set the zone regions to "Trinidad and Tobago" only.

*NOTE that your and contact information from your UPS account would be the default information used for package delivery pick up and delivery cost estimates.*


== Usage ==

Woocommerce would try to match the customer’s shipping address information if present with the shipping zone. The plugin extension would be listed as a delivery option for the shipping zone if applicable. When the plugin extension is selected as a delivery option and once the customers’ address information is present the extension will try to calculate the estimated delivery cost. The currency is in Trinidad and Tobago Dollars.

When an order is marked as “processing” the plugin sends the order’s shipping information to Universal Package Systems’s system which will return a shipping request ID number. A successful return will result in a shipping number being appended to your customer’s order receipt and also an “order note” added to the order which can be viewed via the administration’s mange order details section of Woocommerce.

== Troubleshooting ==

= Unable to install plugin =

Be sure to meet the system’s requirements before installing the plugin. The plugin would not be activated if the store’s country/ selling country/ shipping country does not have Trinidad and Tobago as a value or the currency is not set to Trinidad and Tobago dollars.

= Universal Package Systems Shipping Rate not being set =

Shipping rate for Universal Package Systems will be applied if the currency is in Trinidad and Tobago Dollars and the country of the shipping address value is Trinidad and Tobago.

= Order created but no shipping number assigned =

If the order status has not be marked as “processing” no shipping number would generated. If/ When an order has been set with an order status of “processing” a shipping number would be generated and an order note would be created with the necessary shipping number and details. If an email is sent a shipping number would be appended to the email before being sent. If an order has been set when an order status of “processing” and no order note has been generated try inspecting one of the following:-

1. Ensure all products applicable for shipping have a weight unit and unit dimensions set.
2. Check your login credentials.

If there is still a problem, please contact support highlighting any errors and details pertinent to the order and transaction.

== Screenshots ==

1. Plugin information settings.
2. Woocommerce currency settings.
3. Product shipping attributes.
4. Order note created showing shipping number and delivery information in order notes.
5. Local Shipping Zone with a region set to Trinidad and Tobago.
6. Universal Packages System delivery option in cart display.