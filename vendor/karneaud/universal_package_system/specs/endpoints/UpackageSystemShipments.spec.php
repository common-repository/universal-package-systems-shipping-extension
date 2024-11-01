<?php
use Faker\Factory;
use Kahlan\Plugin\Double;
use UniversalPackageSystems\Endpoint\UpackageSystemShipments;
use UniversalPackageSystems\Endpoint\UpackageSystemEndpointResponse;

describe('Test endpoint shippments class', function () {
    include_once __DIR__ . '/../lib/FakeTokenClass.php';

    beforeAll(function(){
        $faker = Factory::create();
        $this->instance = new UpackageSystemShipments(TEST_CLIENT_ID, new FakeTokenClass, true);
        $this->ship_to = [
         "ShipToCompanyOrName"=> $faker->company,
          "ShipToContact"=> $faker->name,
          "ShipToAddress1"=> $faker->streetAddress,
          "ShipToAddress2"=> $faker->secondaryAddress,
          "ShipToPostalCode"=>'000012',
          "ShipToCountry"=> 'Trinidad and Tobago',
          "ShipToTownCity"=> 'Bon Accord',
          "ShipToTelephone"=> $faker->phoneNumber,
          "ShipToAddressType"=> 'Residential'
        ];
        $this->ship_from = [
          "ShipFromaddressid" => $faker->sha256,
          "ShipFromCompanyOrName"=> $faker->company,
          "ShipFromContact"=> $faker->name,
          "ShipFromAddress1"=> $faker->streetAddress,
          "ShipFromAddress2"=> $faker->secondaryAddress,
          "ShipFromPostalCode"=> '000000',
          "ShipFromCountry"=> 'Trinidad and Tobago',
          "ShipFromTownCity"=> 'San Fernando',
          "ShipFromTelephone"=> $faker->phoneNumber,
          "ShipFromAddressType"=> 'Commercial'
      ];
        $this->shipping_data = [
            'weights' => [
                    $faker->randomDigit,
                    $faker->randomDigit ],
            'codamount' => "0.00",
            'cod' => "false",
            'description' => $faker->sentence(),
            'specialinstructions' => $faker->sentence()
        ];
    });

    it('should fail with exception because from address is fake', function ()
    {
        $self = $this;
        $method = function () use ($self){
          $params = array_merge($self->ship_to, $self->ship_from , $self->shipping_data);
          try {
              $self->instance->createShipment($params);
          } catch (\Exception $e) {
              print_r([$e->getMessage()]);
              throw $e;
          }

        };
        expect($method)->toThrow();
    });

    it('should create new shipment using correct shipping from', function ()
    {
        $ship_from = [
            "ShipFromaddressid" => 'e2fa1488-fdf7-4635-8d97-aad8ca65a86e',
            "ShipFromCompanyOrName"=> 'ME Development Design',
            "ShipFromContact"=> 'Kendall Arneaud',
            "ShipFromAddress1"=> 'Siparia Hill',
            "ShipFromAddress2"=> 'Belmont',
            "ShipFromPostalCode"=> '555555',
            "ShipFromCountry"=> 'Trinidad and Tobago',
            "ShipFromTownCity"=> 'Port of Spain',
            "ShipFromTelephone"=> '+1 (868) 307-2177',
            "ShipFromAddressType"=> 'Commercial'
        ];
        $params = array_merge(
                $this->ship_to,
                $ship_from,
                $this->shipping_data
            );

        $response = $this->instance->createShipment($params);
        expect($response)->toBeAnInstanceOf(UpackageSystemEndpointResponse::class);
        expect($response->cod)->toBe(false);
        expect($response->totalpieces)->toEqual(2);
    });
});
