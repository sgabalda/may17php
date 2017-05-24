<?php

if(isset($_GET['action']))
  $action = $_GET['action'];
else
  $action = '';

switch($action)
{

    case 'home':
    default:
      ob_start();
        include_once("../modules/Web/src/views/Web/home.phtml");
        $content = ob_get_contents();
      ob_end_clean();
    break;
}

include_once("../modules/Web/src/views/layouts/home_layout.phtml");
