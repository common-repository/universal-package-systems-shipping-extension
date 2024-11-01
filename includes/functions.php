<?php
use UniversalPackageSystems\Endpoint\UpackageSystemAddresses;
use UniversalPackageSystems\Endpoint\UpackageSystemEstimates;
use UniversalPackageSystems\Endpoint\UpackageSystemShipments;
use UniversalPackageSystems\Endpoint\UpackageSystemServiceAreas;

function get_service_areas()
{
    if(!($service_areas = get_option(WC_UPACKAGE_SYS__SHIPPING_SERVICE_AREAS_SETTINGS, false))) {
      set_service_areas();
      $service_areas = get_option(WC_UPACKAGE_SYS__SHIPPING_SERVICE_AREAS_SETTINGS, false);
    }

    return $service_areas;
}

/**
	 * set the ups service areas setting option
	 *
	 * @since    1.1.0
	 */
function set_service_areas() {
	try {
        $service_areas = new UpackageSystemServiceAreas(
            get_client_id(),
            new Wc_Upackage_Sys_Token, get_test_mode(),
            new Wc_Upackage_Sys_Transport);
        $service_areas = ($service_areas->getServiceAreas())->getData();
        return add_option(WC_UPACKAGE_SYS__SHIPPING_SERVICE_AREAS_SETTINGS, $service_areas);
      } catch (\Exception $e) {
        wc_add_notice("{$e->getMessage()}", 'error');
    	return false;
      }
}

function is_enabled() {
	$shipping = (WC()->shipping);
	$shipping->load_shipping_methods();
	$methods = $shipping->get_shipping_methods();
	if(array_key_exists( WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN, $methods) ) {
    	$method = ($methods[WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN]);
    	return $method->is_enabled();
    }

	return false;
}

function get_addresses()
{
    if(!($response = get_option(WC_UPACKAGE_SYS__SHIPPING_ADDRESS_SETTINGS, false))){
    	  set_addresses();
    	$response = get_option(WC_UPACKAGE_SYS__SHIPPING_ADDRESS_SETTINGS, false);
    }

    return $response; // use the first address
}

/**
	 * set the ups address setting option
	 *
	 * @since    1.1.0
	 */
function set_addresses()
{
    try {
      $ups_addresses = new UpackageSystemAddresses(
          get_client_id(),
          new Wc_Upackage_Sys_Token, get_test_mode(),
          new Wc_Upackage_Sys_Transport);
      $response = ($ups_addresses->getAddresses())->getData();
      $response = array_shift($response);
      $response = array_merge([
    "object" => "Address",
    "CompanyOrName" => null,
    "Contact" => null,
    "Address1" => null,
    "Address2" => "N/A",
    "PostalCode" => null,
    "TownCity" => null,
    "Telephone" => null,
    "AddressType" => "Commercial"
    ], $response);
      return add_option(WC_UPACKAGE_SYS__SHIPPING_ADDRESS_SETTINGS, $response);
    } catch (\Exception $e) {
      wc_add_notice("{$e->getMessage()}", 'error');
      return false;
    }
}
/**
	 * Get the client ID 
	 *
	 * @since    1.0.2
	 */
function get_client_id()
{
	 return  (get_option(WC_UPACKAGE_SYS__SHIPPING_SETTINGS))['client_id'] ?? null;
}
/**
	 * Get package mode
	 *
	 * @since    1.0.2
	 */
function get_test_mode()
{
    return (get_option(WC_UPACKAGE_SYS__SHIPPING_SETTINGS))['test'] ?? false;
}


function create_shipment(
  $ship_to, $weights,
  $codamount = 0.00, $cod = true,
  $specialinstructions = 'N/A', $description = 'N/A')
{
  $results = null;
  $ship_from = get_addresses();
  $ship_from = array_combine([
   "ShipFromaddressid",
   "ShipFromCompanyOrName",
   "ShipFromContact",
   "ShipFromAddress1",
   "ShipFromAddress2",
   "ShipFromPostalCode",
   "ShipFromTownCity",
   "ShipFromTelephone",
   "ShipFromAddressType"
  ], $ship_from);
  $ship_from['ShipFromaddressid'] = 0;
  $ship_from['ShipFromCountry'] = 'Trinidad and Tobago';
  $ship_from = array_merge($ship_from, $ship_to, compact('weights','cod', 'codamount','specialinstructions', 'description'));
  try {
    $create_shipment = new UpackageSystemShipments(
      get_client_id(),
      new Wc_Upackage_Sys_Token, get_test_mode(), new Wc_Upackage_Sys_Transport

    );
    $results = $create_shipment->createShipment($ship_from);
  } catch (\Exception $e) {
    wc_add_notice("{$e->getMessage()}", 'error');
  }

  return $results;
}

function get_shipping_estimates($ship_to, $total, $weights) {
  $ship_from = get_addresses()['TownCity'];
  try {
  
  
    $shipping_estimates = new UpackageSystemEstimates(
        get_client_id(),
        new Wc_Upackage_Sys_Token, 
    	get_test_mode(), 
    	new Wc_Upackage_Sys_Transport
        );
    $shipping_estimates = ($shipping_estimates->getEstimateShippingCost(
              $ship_from,
              $ship_to,
              $weights,
              $total,
              0.0
            ))->getData();

  } catch (\Exception $e) {
    wc_add_notice("{$e->getMessage()}", 'error');
  }

  return $shipping_estimates;
}
