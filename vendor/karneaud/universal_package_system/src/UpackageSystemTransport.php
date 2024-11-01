<?php
namespace UniversalPackageSystems;

use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use UniversalPackageSystems\UpackageSystemException;
use UniversalPackageSystems\UpackageSystemTransportInterface;
use UniversalPackageSystems\Endpoint\UpackageSystemEndpointResponse;
/**
 * Fallback class that uses httplug implementation
 * The class will try to find any transport packages installed and use as necessary
 * Pass this class to endpoints as default or implement your own using interface.
 */
final class UpackageSystemTransport implements UpackageSystemTransportInterface
{

  protected $client;
  protected $request;

  public function __construct()
  {
    $this->client = HttpClientDiscovery::find();
    $this->request = MessageFactoryDiscovery::find();

    if(is_null($this->client) || is_null($this->request)) throw new \Exception('Could not find transport package. Please implement your own.');
  }

  public function doRequest(string $url, string $method = 'GET', array $headers = null, array $params = null) : UpackageSystemEndpointResponse {
    $request = $this->request->createRequest($method, $url, $headers, json_encode($params));
    $response = $this->client->sendRequest($request);
    if($response->getStatusCode() != 200) {
      $meta = json_decode($response->getBody()->getContents(), true)['meta'];
      throw new UpackageSystemException(
        $meta['code'],
        "{$response->getReasonPhrase()} {$meta['message']}"
      );
    }

    return new UpackageSystemEndpointResponse($response->getStatusCode(), json_decode($response->getBody()->getContents(), true)['data']);
  }
}
