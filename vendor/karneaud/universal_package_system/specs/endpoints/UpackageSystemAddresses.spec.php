<?php
use Kahlan\Plugin\Double;
use UniversalPackageSystems\Endpoint\UpackageSystemAddresses;
use UniversalPackageSystems\Endpoint\UpackageSystemAddressesResponse;

describe('Test endpoint addresses class', function () {
    include_once __DIR__ . '/../lib/FakeTokenClass.php';

    $instance = new UpackageSystemAddresses(TEST_CLIENT_ID, new FakeTokenClass, true);

    it('should return array of addresses', function () use ($instance)
    {
        expect(($response = $instance->getAddresses()))->toBeAnInstanceOf(UpackageSystemAddressesResponse::class);
        expect(count((array) $response))->toBeGreaterThan(0);
        expect(($result = $response->getAddressByName('Kendall Arneau')))->toBeA('array');
        expect($result)->toContainKey('CompanyOrName');
        expect($result['CompanyOrName'])->toEqual('Kendall Arneaud');
    });
});
