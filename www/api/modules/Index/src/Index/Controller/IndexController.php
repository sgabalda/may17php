<?php
namespace Index\Controller;

class IndexController
{
  public $layout = '';

  public function indexAction()
  {
    $content = "Estas en index";
    return $content;
  }
}
