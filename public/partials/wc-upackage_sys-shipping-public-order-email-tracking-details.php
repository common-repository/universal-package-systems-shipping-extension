<h2 class="<?php echo WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN ?>_tracking_title">
	<?php 
          echo  __($sent_to_admin?  'Shipping Information' : 'Delivery Tracking Information', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN);
     	 ?>
</h2>

<div class="<?php echo WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN ?>_tracking_details">
	<table>
		<tbody>
        <tr class="tracking_id"><th><?php echo __('Tracking Id', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN) ?></th><td><?php print $order->get_meta('shipping_id') ?></td></tr>
        <tr class="no_items"><th><?php echo __('No of Items', WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN) ?></th><td><?php print $order->get_meta('shipment_pieces') ?></td></tr>
		</tbody>
</table>
</div>