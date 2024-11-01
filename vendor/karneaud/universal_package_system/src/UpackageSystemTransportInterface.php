<?php
namespace UniversalPackageSystems;

use UniversalPackageSystems\Endpoint\UpackageSystemEndpointResponse;
/**
 * Interface to handle access token properties
 */
interface UpackageSystemTransportInterface {
  /**
   * @method doRequest sends the data needed to perform a http request
   *
   * @param  string $url the url of the request
   * @param  string $method the request protocol actions of type 'GET', 'POSt' etc.
   * @param  string $headers an array of headers to set for request
   * @param  string $params data to be sent along with request
   * @return UpackageSystemEndpointResponse
   */
  public function doRequest(string $url, string $method = 'GET', array $headers = null, array $params = null) : UpackageSystemEndpointResponse;
}
