<?php
use UniversalPackageSystems\UpackageSystemException;
use UniversalPackageSystems\UpackageSystemTransportInterface;
use UniversalPackageSystems\Endpoint\UpackageSystemEndpointResponse;

class Wc_Upackage_Sys_Transport implements UpackageSystemTransportInterface {

    public function doRequest(string $url, string $method = 'GET', array $headers = null, array $params = null) : UpackageSystemEndpointResponse
    {
        $response = wp_remote_request($url, [
            'headers' => $headers ?? [],
            'method' => ($method = strtoupper($method)),
            'body' => $method == 'GET'? $params : json_encode($params),
            'data_format' => 'body'
        ]);

        if($response instanceof WP_Error) throw new UpackageSystemException(($code = $response->get_error_code()), join(",", $response->get_error_messages($code)));
        else if($response['response']['code'] != 200) throw new UpackageSystemException(($code = $response['response']['code']), $response['body']);

        $data = json_decode($response['body'], true);

        return new UpackageSystemEndpointResponse($response['response']['code'], $data['data']);
    }
}
