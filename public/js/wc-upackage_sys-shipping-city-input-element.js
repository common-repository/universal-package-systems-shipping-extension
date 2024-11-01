(function( $ ) {
	'use strict';

	function country_to_city_change(e, country, $wrapper) {
		// Grab wrapping element to target only stateboxes in same 'group'
		if ( ! $wrapper || ! $wrapper.length ) {
			$wrapper = $( this ).closest('.form-row').parent();
		}
    	
    	if(!country) {
        	country = $(this).val();
        }
    
		var
            $citybox = $wrapper.find( '#billing_city, #shipping_city, #calc_shipping_city'),
			 
            $parentCityBox = $citybox.closest('p.form-row'),
            cityboxId = $citybox.attr('id')
    
		if ( country == 'TT' ) {
        	city_to_select2($citybox)
        	hide_state($wrapper);
		} else {
        	 if($citybox.hasClass('select2-hidden-accessible')) $citybox.select2('destroy');
        	 $citybox = build_city_select_element($citybox, default_city_element)
        }
	}

		function city_to_select2($citybox) {
			var input_classes = $citybox.attr('data-input-classes'), selected_city = customer_city || $citybox.val();
			if(!$citybox.is('select')) $citybox = build_city_select_element($citybox, city_select_template);
     		if(!$citybox.hasClass('select2-hidden-accessible')) $citybox.select2({ width: '100%' }).on('select2:select', function(){
                    $(document.body).trigger('update_order_review')
                    $(document.body).trigger('update_checkout');
                })

            $citybox.select2().val(selected_city).addClass(input_classes);
	  }

	function hide_state($wrapper) {
    	 setTimeout(function(){ 
                var $statebox = $wrapper.find( '#billing_state, #shipping_state, #calc_shipping_state' ),$parentStateBox = $statebox.closest( 'p.form-row' )
                $parentStateBox.css('display', 'none');
                $statebox.prop('disabled', true).css('display','none');
            }, 100)
    }
    
    
	 function build_city_select_element($el, data) {
		 var id = $el.attr('id'), name = $el.attr('name')
		 $el.replaceWith(
			 data.replace('{id}',id).replace('{name}', name)
		 );
     
     	return $('#' + id)
	 }

	var city_select_template = '<select name="{name}"  rel="" class="city_select" id="{id}" data-placeholder="Town/ City"><option value="">Select an option&hellip;</option>'+
	 ups_service_areas.reduce(function(o, v, i, arr){
		 return o + '<option value="'+v+'">'+v+'</option>';
	 })
	 +'</select>', wrapper_selectors = '.woocommerce-billing-fields,' +
			'.woocommerce-shipping-fields,' +
			'.woocommerce-address-fields,' +
			'.woocommerce-shipping-calculator';
        $(document.body).on( 'change refresh', 'select.country_to_state, input.country_to_state', country_to_city_change);
        $(document.body).bind('country_to_state_changed',function(){
            var $citybox = $(document.body).find( '#billing_city, #shipping_city, #calc_shipping_city').each(function(){
                var $citybox = $(this), $wrapper = $( this ).closest('.form-row').parent(), country = $wrapper.find('.country_to_state').val();
                if(country !=  'TT' ) return;

                city_to_select2($citybox)
                hide_state($wrapper);
            });


        }).trigger('country_to_state_changed');;

	
})( jQuery );
