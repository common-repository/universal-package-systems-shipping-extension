<?php
namespace UniversalPackageSystems\Endpoint;

use Pr7\Http\Message\RequestInterface;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use UniversalPackageSystems\TokenMethodsTrait;
use UniversalPackageSystems\TransportMethodsTrait;
use UniversalPackageSystems\Endpoint\AbstactUpackageSystemEndpoint;
use UniversalPackageSystems\Endpoint\UpackageSystemEndpointResponse;

class UpackageSystemShipments extends AbstractUpackageSystemEndpoint
{
  use TransportMethodsTrait, TokenMethodsTrait;

  /**
   * @method createShippment creates a shipping manifest using the shipping information passed
   *
   * @param array $shipping_info and array with the following properties "description": "string",
   *          "specialinstructions": "string",
   *          "weights": [
   *              "int"
   *          ],
    *          "cod": "bool",
    *          "codamount": "decimal",
    *          "ShipToCompanyOrName": "string",
    *          "ShipToContact": "string",
    *          "ShipToAddress1": "string",
    *          "ShipToAddress2": "string",
    *          "ShipToPostalCode": "string",
    *          "ShipToCountry": "string",
    *          "ShipToTownCity": "string",
    *          "ShipToTelephone": "string",
    *          "ShipToAddressType": "string",
    *          "ShipFromaddressid": "string",
    *          "ShipFromCompanyOrName": "string",
    *          "ShipFromContact": "string",
    *          "ShipFromAddress1": "string",
    *          "ShipFromAddress2": "string",
    *          "ShipFromPostalCode": "string",
    *          "ShipFromCountry": "string",
    *          "ShipFromTownCity": "string",
    *          "ShipFromTelephone": "string",
    *          "ShipFromAddressType": "string"
   * @return UpackageSystemEndpointResponse object data with the following properties "shipmentid": "guid",
    *        "shipfrom": "string",
    *        "shipto": "string",
    *        "totalpieces": "int",
    *        "totalweight": "int",
    *        "shippingcharges": "decimal",
    *        "cod": "bool",
    *        "codamount": "decimal",
    *        "codsurcharge": "decimal",
    *        "servicenote": "string",
    *        "date": "datetime",
    *        "created": "datetime",
    *        "statusdate": "datetime",
    *        "statusreason": "string"
    */
  public function createShipment(array $shipping_info) : UpackageSystemEndpointResponse {
      $response = $this->makeEndpointRequest(
        'shipments',
        $shipping_info,
        'POST'
      );

     return $response;
  }
}
