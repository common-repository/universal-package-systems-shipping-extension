<?php
namespace UniversalPackageSystems\Endpoint;

use Pr7\Http\Message\RequestInterface;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use UniversalPackageSystems\TokenMethodsTrait;
use UniversalPackageSystems\TransportMethodsTrait;
use UniversalPackageSystems\Endpoint\AbstactUpackageSystemEndpoint;
use UniversalPackageSystems\Endpoint\UpackageSystemEndpointResponse;

class UpackageSystemServiceAreas extends AbstractUpackageSystemEndpoint
{
  use TransportMethodsTrait, TokenMethodsTrait;

  public function getServiceAreas() : UpackageSystemEndpointResponse {
      $response = $this->makeEndpointRequest(
        'serviceareas'
      );

      return new UpackageSystemServiceAreasResponse($response->getData());
  }
}


/**
 *
 */
class UpackageSystemServiceAreasResponse extends UpackageSystemEndpointResponse
{

    public function __construct(array $data)
    {
        parent::__construct(0, $data);
    }

    public function searchAreaByName(string $name) : ?array
    {
      return preg_grep("/$name/i", $this->data);
    }

    public function getAreaByName(string $name) : ?string
    {
      return $this->searchAreaByName($name)[0];
    }
}
