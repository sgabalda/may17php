<?php

if(isset($_GET['action']))
  $action = $_GET['action'];
else
  $action = '';

switch($action)
{
    case '404':
      ob_start();
        include_once("../modules/Error/src/views/Error/404.phtml");
        $content = ob_get_contents();
      ob_end_clean();
    break;
    case '500':
    break;
    case '303':
    break;
    default:
      ob_start();
        include_once("../modules/Error/src/views/Error/default.phtml");
        $content = ob_get_contents();
      ob_end_clean();
    break;
}

include_once("../modules/Error/src/views/layouts/error_layout.phtml");
