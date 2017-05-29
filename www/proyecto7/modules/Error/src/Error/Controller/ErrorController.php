<?php
namespace Error\Controller\ErrorController;

class ErrorController
{
  public $layout = "../modules/Error/src/views/layouts/error_layout.phtml";

  public function _404Action()
  {
    ob_start();
      include_once("../modules/Error/src/views/Error/404.phtml");
      $content = ob_get_contents();
    ob_end_clean();
    return $content;
  }
}
