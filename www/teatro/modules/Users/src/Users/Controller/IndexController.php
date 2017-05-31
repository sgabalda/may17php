<?php
namespace Users\Controller;

class IndexController
{
  public $layout = "../modules/Users/src/views/layouts/simple_layout.phtml";

  public function indexAction()
  {
    $data=[];
    $content = __CLASS__;
    return array($content,$content);;
  }
}
