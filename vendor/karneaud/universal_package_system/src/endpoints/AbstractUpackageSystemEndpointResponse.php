<?php
namespace UniversalPackageSystems\Endpoint;

use UniversalPackageSystems\UpackageSystemResponseInterface;

abstract class AbstractUpackageSystemEndpointResponse implements UpackageSystemResponseInterface
{
  protected $data = null;
  protected $status = 0;

  public function __construct(int $status, array $data = null)
  {
    $this->status = $status;
    $this->data = $data;
  }

  public function __get(string $key)
  {
      if(!is_array($this->data) || !array_key_exists($key, $this->data))
      {

        return null;
      }

      return $this->data[$key];
  }

  public function __toArray() : array
  {
      return ['status' => $this->status , 'data' => $this->data ];
  }

  public function getStatus() : int
  {
      return $this->status;
  }

  public function getData() : ?array
  {
    return $this->data;
  }
}
