<?php
use UniversalPackageSystems\UpackageSystemTokenInterface;

class FakeTokenClass implements UpackageSystemTokenInterface {
    protected $cookie;

    function __construct() {

    }

    function getAccessToken() : ?string {
        return $this->cookie['access_token'];
    }
    function getRefreshToken() : ?string {
        return $this->cookie['refresh_token'];
    }
    function set(string $token, string $refresh, $expires)  {
        $this->cookie = [
            'access_token' => $token,
            'refresh_token' => $refresh,
            'expires_at' => $expires
        ];
    }

    function accessTokenHasExpired () : bool {
            return ((time() - $this->cookie['expires_at']) >= 0);
        }

        function getCookie () {
            return $this->cookie;
        }
}

if(!defined('TEST_CLIENT_ID')) define('TEST_CLIENT_ID','c156e7e8-aa80-40b0-9e7d-a5e1a80df3d6');
