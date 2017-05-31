<?php
namespace Cervezza\Utils\Abstracts;

abstract class Routeable implements \Cervezza\Utils\Interfaces\Routeable
{
  protected $router;

  public function getRouter()
  {
    return $this->router;
  }
  public function setRouter($router)
  {
    $this->router=$router;
    return $router;
  }

}
