<?php
use UniversalPackageSystems\UpackageSystemTokenInterface;

class Wc_Upackage_Sys_Token implements UpackageSystemTokenInterface {

    protected $cookie;
    protected $option = WC_UPACKAGE_SYS__SHIPPING_TEXT_DOMAIN . "_token";

    function __construct() {
        $this->cookie = get_option( $this->option , null );
    }

    function getAccessToken() : ?string {
        return $this->cookie['access_token'] ?? null;
    }
    function getRefreshToken() : ?string {
        return $this->cookie['refresh_token'] ?? null;
    }

    function set(string $token, string $refresh, $expires)  {
        $this->cookie = [
            'access_token' => $token,
            'refresh_token' => $refresh,
            'expires_at' => $expires
        ];

        add_option( $this->option , $this->cookie , '' , 'yes' );
    }

    function accessTokenHasExpired () : bool {
        return ((time() - $this->cookie['expires_at']) >= 0);
    }
}
