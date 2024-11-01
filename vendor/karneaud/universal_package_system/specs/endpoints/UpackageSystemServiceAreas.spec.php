<?php
use Kahlan\Plugin\Double;
use UniversalPackageSystems\Endpoint\UpackageSystemServiceAreas;
use UniversalPackageSystems\Endpoint\UpackageSystemServiceAreasResponse;

describe('Test endpoint service areas class', function () {
    include_once __DIR__ . '/../lib/FakeTokenClass.php';

    $instance = new UpackageSystemServiceAreas(TEST_CLIENT_ID, new FakeTokenClass, true);

    it('should return array of areas', function () use ($instance)
    {
        expect(($response = $instance->getServiceAreas()))->toBeAnInstanceOf(UpackageSystemServiceAreasResponse::class);
        $arr = $response->__toArray();
        expect($arr)->toBeGreaterThan(0);
        expect(array_shift($arr))->toEqual('Aranguez');
    });
});
