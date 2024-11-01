<?php
namespace UniversalPackageSystems;
/**
 * Interface to handle access token properties
 */
interface UpackageSystemTokenInterface {

  /**
   * @method tokenHasExpired checks if token has expired
   * @return bool returns true or false if token has expired
   */
  public function accessTokenHasExpired() : bool;
  /**
   * @method getAccessToken gets an authorized token for the client_id
   * @return mixed returns the access_token property value
   */
  public function getAccessToken() : ?string;
  /**
   * @method getFreshAccessToken gets the refresh token for the client_id
   * @return string returns the refresh_token property value or null
   */
   public function getRefreshToken() : ?string;
   /**
    * @method set sets the token data information
    * @param string $token the string access_token value
    * @param string $refresh the string refresh_token value
    * @param string $expires the date/ time expires_at value
    */
    public function set(string $token, string $refresh, $expires);
}
