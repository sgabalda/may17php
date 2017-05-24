<?php


function Dispatch($route, $config)
{
  include_once('../modules/'.ucfirst($route['module']).
               '/src/'.ucfirst($route['module']).
               '/Controller/'.
               ucfirst($route['controller']).'Controller.php');

  $controllerName = ucfirst($route['controller'])."Controller";
  $actionName = $route['action']."Action";
  echo $controllerName;
  echo $actionName;

  $controller = new $controllerName();
  $view = $controller->$actionName($config);
  $layout = $controller->layout;

  return array('layout'=>$layout,'view'=>$view);
}
