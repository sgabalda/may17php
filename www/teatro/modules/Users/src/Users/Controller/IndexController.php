<?php
namespace Users\Controller;

class IndexController
{
  public $layout = "";

  public function indexAction()
  {
    $data=[];
    $content = "Hello Module";
    return array($content,$content);;
  }
}
