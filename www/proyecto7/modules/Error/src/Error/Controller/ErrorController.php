<?php

class ErrorController
{
  public function _404Action()
  {
    ob_start();
      include_once("../modules/Error/src/views/Error/404.phtml");
      $content = ob_get_contents();
    ob_end_clean();
    return $content;
  }
}


include_once("../modules/Error/src/views/layouts/error_layout.phtml");
