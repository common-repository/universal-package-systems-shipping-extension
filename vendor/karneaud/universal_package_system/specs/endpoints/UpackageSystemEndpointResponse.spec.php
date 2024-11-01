<?php
use Faker\Factory;
use Kahlan\Plugin\Double;
use UniversalPackageSystems\Endpoint\UpackageSystemEstimates;
use UniversalPackageSystems\Endpoint\UpackageSystemEndpointResponse;

describe('Test endpoint estimates class', function () {
    include_once __DIR__ . '/../lib/FakeTokenClass.php';

    $instance = new UpackageSystemEstimates(TEST_CLIENT_ID, new FakeTokenClass, true);
    $faker = Factory::create();
    $fake_data = [
        'Port of Spain',
        'Barataria',
        [2],
        12.00,
        $faker->randomFloat(2)
    ];

    it('should return Response', function () use ($instance, $fake_data)
    {
        expect(($response = $instance->getEstimateShippingCost(...$fake_data)) instanceof UpackageSystemEndpointResponse)
          ->toBeTruthy();
        expect($response->ship_from)->toEqual($fake_data[0]);
        expect($response->shipping_charges)->toBeA('float');
    });
});
