<?php
namespace UniversalPackageSystems;
/**
 *
 */
interface UpackageSystemResponseInterface {

  public function __get(string $key);
  public function __toArray() : array;
  public function getStatus() : int;

}
