<?php
namespace UniversalPackageSystems;

use UniversalPackageSystems\UpackageSystemResponseInterface as ResponseInterface;
/**
 * Trait holding transport methods for making http api calls
 */
trait TransportMethodsTrait
{
  /** @var UpackageSystemTransportInterface the transport client to use for http requests */
  protected $transport;
  /** @var array headers that will be sent with transport to api url */
  protected $headers = [
    'Content-Type' => 'application/json;charset=UTF-8'
  ];
  /** @var bool whether or not we are testing */
  protected $is_test = false;
  /**
   * @method fetch performs the request and returns a response
   * @param  string $method transport method to perform 'GET' or 'POST'
   * @param  string $url the url to transport params
   * @param  array $params parameters to pass to the api if any
   * @param  array $headers to set for the api if any
   * @return  ResponseInterface returns a api endpoint data
   */
  protected function fetch(string $url, array $params = null, string $method = 'GET', array $headers = null) : ResponseInterface {
    $headers = $this->getHeaders($headers);
    $response = $this->transport->doRequest($url, $method, $headers, $params);

    return $response;
  }
  /**
   * @method getApiUrl builds api url
   * @param  string $endpoint pass an endpoint to append to url
   * @return string returns a api endpoint url
   */
  protected function getApiUrl(string $endpoint) : string {

    include_once __DIR__ . '/constants.php';

    return sprintf("http://%s/%s/v%d/%s"
          , BASE_API_URL
          , $this->is_test ? BASE_TEST_ENDPOINT : BASE_ENDPOINT
          , API_VERSION
          , $endpoint );
  }
  /**
   * @method getHeaders gets headers to use
   * @param  array $headers additional headers to pass if any
   * @return array returns an array of headers
   */
  protected function getHeaders(array $headers = null) : array {
    if(empty($headers)) $headers = $this->headers;

    $headers = array_merge($this->headers, $headers);
    return $headers;
  }
}
