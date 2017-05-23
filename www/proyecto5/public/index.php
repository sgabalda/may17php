<?php

if(isset($_GET['controller']))
  $controller = $_GET['controller'];
else
  $controller = 'web';

include_once('../vendor/cervezza/Utils/src/Utils/Router.php');

$route = Router($_SERVER['REQUEST_URI']);

echo "<pre>url: ";
print_r($_SERVER['REQUEST_URI']);
echo "</pre>";

echo "<pre>";
print_r($route);
echo "</pre>";

die("parar");

switch($controller)
{
    case 'web':
      ob_start();
        include_once("../modules/Web/src/Web/Controller/WebController.php");
        $content = ob_get_contents();
      ob_end_clean();

    break;
    case 'login':
      ob_start();
        include_once("../modules/Login/src/Login/Controller/LoginController.php");
        $content = ob_get_contents();
      ob_end_clean();
    break;
    case 'error':
      ob_start();
        include_once("../modules/Error/src/Error/Controller/ErrorController.php");
        $content = ob_get_contents();
      ob_end_clean();
    break;
    case 'users':
      ob_start();
        include_once("../modules/UserRegister/src/UserRegister/Controller/UserController.php");
        $content = ob_get_contents();
      ob_end_clean();
    break;
    default:

    break;
}

echo $content;
// echo "On maintenance";
