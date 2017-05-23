<?php

if(isset($_GET['action']))
  $action = $_GET['action'];
else
  $action = '';

switch($action)
{
    case 'login':
    default:
      ob_start();
        include_once("../modules/Login/src/views/Login/login.phtml");
        $content = ob_get_contents();
      ob_end_clean();
    break;
}

include_once("../modules/Login/src/views/layouts/login_layout.phtml");
