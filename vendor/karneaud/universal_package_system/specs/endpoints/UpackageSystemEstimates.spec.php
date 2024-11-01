<?php
use Faker\Factory;
use Kahlan\Plugin\Double;
use UniversalPackageSystems\Endpoint\UpackageSystemEstimates;

describe('Test endpoint estimates class', function () {
    include_once __DIR__ . '/../lib/FakeTokenClass.php';

    $instance = new UpackageSystemEstimates('123', new FakeTokenClass, true);
    $faker = Factory::create();
    $fake_data = [
        $faker->address,
        $faker->address,
        [$faker->randomDigit],
        $faker->randomFloat(2),
        $faker->randomFloat(2)
    ];

    it('should fail with exception because id is fake', function () use ($instance, $fake_data)
    {
        $method = function () use ($instance, $fake_data) {
          $instance->getEstimateShippingCost(...$fake_data);
        };
        expect($method)->toThrow();
    });
});
