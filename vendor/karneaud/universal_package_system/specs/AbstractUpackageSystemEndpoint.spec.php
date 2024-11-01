<?php
use Kahlan\Plugin\Double;
use UniversalPackageSystems\Endpoint\AbstractUpackageSystemEndpoint;

/**
 *
 */
class FakeEndpoint extends AbstractUpackageSystemEndpoint
{
    public $time = null;

    public function getToken()
    {
      return $this->token->getAccessToken();
    }

    public function getRefreshToken()
    {
      return $this->token->getRefreshToken();
    }

    public function hasTokenExpired() {
        return $this->token->accessTokenHasExpired();
    }

    public function get($value='')
    {
      // code...
    }

    public function fetchAccessToken()
    {
        $data = $this->getAccessToken($this->client_id);
        $this->setTokenData($data);

        return $data;
    }

    public function refreshToken($token = '')
    {
        $data = $this->getFreshAccessToken($token);
        $this->setTokenData($data);

        return $this->getToken();
    }

    protected function setTokenData(array $data) {
        extract($data);
        $this->time = $expires_at;
        $this->token->set($access_token,$refresh_token,$expires_at);
    }
}


describe('Test abstract class', function () {
    include_once 'lib/FakeTokenClass.php';

    beforeAll(function(){
        $this->instance = new FakeEndpoint(
            'c156e7e8-aa80-40b0-9e7d-a5e1a80df3d6',
            new FakeTokenClass,
            true
        );
    });

    it('should be instance of', function () {
      expect($this->instance instanceof AbstractUpackageSystemEndpoint)->toBe(true);
    });

    it('should get valid access_token', function () {
      expect(is_null($response = $this->instance->fetchAccessToken()))->toBe(false);
      expect($response)->toBeA('array');
      expect($response)->toContainKey('access_token');
    });

    it('should get the refresh_token', function () {
      $refresh_token = $this->instance->getRefreshToken();
      expect($refresh_token)->toBeA('string');
    });
});
