<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://kendallarneaud.me
 * @since      1.1.0
 *
 * @package    Wc_UPSys_Local_Delivery_Shipping
 * @subpackage Wc_UPSys_Local_Delivery_Shipping/public/partials
 */

   $current_r = WC()->customer->get_shipping_city();
	$citys = get_service_areas(); 
?>
<p class="form-row form-row-wide" id="calc_shipping_city_field">
<span>
      <select name="calc_shipping_city"  rel="calc_shipping_city" class="city_select country_to_city" id="calc_shipping_city" data-placeholder="<?php esc_attr_e( 'Town/ City', 'woocommerce' ); ?>">
        <option value=""><?php esc_html_e( 'Select an option&hellip;', 'woocommerce' ); ?></option>
        <?php
        foreach ( $citys as $cvalue ) {
          echo '<option value="' . esc_attr( $cvalue ) . '" ' . selected( $current_r, $cvalue, false ) . '>' . esc_html( $cvalue ) . '</option>';
        }
        ?>
      </select>
    </span>
  </p>