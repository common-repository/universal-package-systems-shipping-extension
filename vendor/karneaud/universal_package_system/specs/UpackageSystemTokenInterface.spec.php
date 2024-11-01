<?php
use Kahlan\Plugin\Double;
use Kahlan\Filter\Filters;

describe('Test token interface', function () {
    include_once 'lib/FakeTokenClass.php';
    $instance = new FakeTokenClass;

    it('should be instance class', function () use ($instance) {
      expect($instance instanceof FakeTokenClass)->toBe(true);
    });

    it('should set token', function() use ($instance) {
        expect(method_exists($instance, 'set'))->toBe(true);
        $instance->set('12345678','abcdefgh', strtotime('+5 seconds'));
        expect($instance->getCookie())->toBeA('array');
    });

    it('should retrieve token', function()use ($instance) {
        expect($instance->getAccessToken())->toEqual('12345678');
    });

    it('should not have expired token', function()use ($instance) {
        expect($instance->accessTokenHasExpired())->toEqual(false);
    });

    it('should have expired token', function () use ($instance) {
        sleep(6);
        expect($instance->accessTokenHasExpired())->toEqual(true);
    });

});
