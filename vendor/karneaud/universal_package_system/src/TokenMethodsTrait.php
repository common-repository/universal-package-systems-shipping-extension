<?php
namespace UniversalPackageSystems;

use UniversalPackageSystems\UpackageSystemResponseInterface as ResponseInterface;
/**
 * Trait holding api methods for making http api calls
 */
trait TokenMethodsTrait
{
  /**
   * @method getAccessToken performs the request to authorize client_id
   * @param  string $client_id user account id to authorize
   * @return array returns endpoint data access_token, refresh_token, expires_at
   */
  protected function getAccessToken(string $client_id ) : ?array {
      $data = null;
      $response = $this->fetch($this->getApiUrl('tokens'), ['grant_type' => 'client_id', 'client_id' => $client_id], 'POST');
      $data = $response->getData();

      return $data;
  }
  /**
   * @method getRefreshAccessToken performs the request to renew access_token
   * @param  string $refresh_token refresh_token from previous token
   * @return array returns endpoint data access_token, refresh_token, expires_at
   */
  protected function getFreshAccessToken(string $refresh_token) : ?array {
    $data = null;
    $response = $this->fetch($this->getApiUrl('tokens'), ['grant_type' => 'refresh_token', 'refresh_token' => $refresh_token ], 'POST');
    $data = $response->getData();

    return $data;
  }

  abstract protected function getApiUrl(string $endpoint) : string;

  abstract protected function fetch( string $url, array $params = null, string $method = 'GET', array $headers = null) : ResponseInterface;
}
