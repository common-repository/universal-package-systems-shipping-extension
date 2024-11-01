<?php
namespace UniversalPackageSystems\Endpoint;

use Pr7\Http\Message\RequestInterface;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use UniversalPackageSystems\TokenMethodsTrait;
use UniversalPackageSystems\TransportMethodsTrait;
use UniversalPackageSystems\Endpoint\AbstactUpackageSystemEndpoint;
use UniversalPackageSystems\Endpoint\UpackageSystemEndpointResponse;

class UpackageSystemEstimates extends AbstractUpackageSystemEndpoint
{
  use TransportMethodsTrait, TokenMethodsTrait;

  public function getEstimateShippingCost(
              string $ship_from,
              string $ship_to,
              array $weights,
              float $cod_amount = 0.0,
              float $insured_value = 0.0
            ) : UpackageSystemEndpointResponse {
      $response = $this->makeEndpointRequest(
        'estimates',
        compact('ship_from','ship_to','weights','cod_amount','insured_value'),
        'POST'
      );

      return $response;
  }
}
