<?php
namespace Cervezza\Utils\Interfaces;

interface Routeable
{
  public function getRouter();
  public function setRouter($router);
}
