<?php
namespace Index\Controller\IndexController;

class IndexController
{
  public $layout = '';

  public function indexAction()
  {
    $content = "Estas en index";
    return $content;
  }
}
