<?php
namespace UniversalPackageSystems\Endpoint;

use Pr7\Http\Message\RequestInterface;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use UniversalPackageSystems\TokenMethodsTrait;
use UniversalPackageSystems\TransportMethodsTrait;
use UniversalPackageSystems\Endpoint\AbstactUpackageSystemEndpoint;
use UniversalPackageSystems\Endpoint\UpackageSystemEndpointResponse;

class UpackageSystemAddresses extends AbstractUpackageSystemEndpoint
{
  use TransportMethodsTrait, TokenMethodsTrait;

  public function getAddresses() : UpackageSystemEndpointResponse {
      $response = $this->makeEndpointRequest(
        'addresses'
      );

      return new UpackageSystemAddressesResponse($response->getData());
  }
}

/**
 *
 */
class UpackageSystemAddressesResponse extends UpackageSystemEndpointResponse
{
    public function __construct(array $data)
    {
        parent::__construct(0, $data);
    }

    public function searchAddressBy(string $name, string $value) : ?array
    {
      $matches = [];
      array_walk($this->data, function($item, $key, $value) use ($name, &$matches) {
        if(stristr($item[$name], $value)) array_push($matches, $item);

      }, $value);

      return $matches;
    }

    public function getAddressByName(string $name) : ?array
    {
      $results = $this->searchAddressBy('CompanyOrName', $name);

      return empty($results) ? null : $results[0];
    }
}
