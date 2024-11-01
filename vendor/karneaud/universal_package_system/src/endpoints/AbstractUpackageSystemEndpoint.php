<?php
namespace UniversalPackageSystems\Endpoint;

use UniversalPackageSystems\TokenMethodsTrait;
use UniversalPackageSystems\TransportMethodsTrait;
use UniversalPackageSystems\UpackageSystemException;
use UniversalPackageSystems\UpackageSystemTransport;
use UniversalPackageSystems\UpackageSystemTokenInterface;
use UniversalPackageSystems\UpackageSystemTransportInterface;
use UniversalPackageSystems\Endpoint\UpackageSystemEndpointResponse;

abstract class AbstractUpackageSystemEndpoint
{
  use TransportMethodsTrait, TokenMethodsTrait;

  protected $client_id;
  protected $token;

  function __construct(string $id, UpackageSystemTokenInterface $cache, bool $test = false, UpackageSystemTransportInterface $http = null)
  {
      $this->client_id = $id;
      $this->token = $cache;
      $this->is_test = $test;
      $this->transport = $http ?? new UpackageSystemTransport();
  }

  protected function getAuthHeaders() : array {
    return ['Authorization' => "Bearer {$this->token->getAccessToken()}"];
  }

  protected function getValidToken() : ?string {
    if(is_null(($data = $this->token->getAccessToken()))) {
      $data = $this->getAccessToken($this->client_id);
    } else if($this->token->accessTokenHasExpired()) {
      $data = $this->getFreshAccessToken( $this->token->getRefreshToken());
    } else {
      return $this->token->getAccessToken();
    }
    if(!is_array($data)) throw new UpackageSystemException('500', 'Undefined token data' );

    extract($data);
    $this->token->set($access_token, $refresh_token, $expires_at);

    return $this->token->getAccessToken();
  }

  protected function makeEndpointRequest(string $endpoint, array $params = null, string $method = 'GET') : UpackageSystemEndpointResponse
  {
    $token = $this->getValidToken();
    $url = $this->getApiUrl($endpoint);
    $headers = $this->getAuthHeaders($token);
    $response = $this->fetch($url, $params, $method, $headers);

    return $response;
  }
}
