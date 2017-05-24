<?php

/**
 * Set route from url
 * string url
 * array route
 *
 * /users/delete/iduser/8         ---> ok
 * /users/delete/iduser/8/kaka    ---> error
 * /users/delete/iduser           ---> error
 * /users/delete                  ---> ok
 * /users/kaka                    ---> error
 * /users                         ---> ok
 * /kaka                          ---> error
 * /                              ---> ok
 */

function Router($url='/')
{

  echo "<pre>";
  print_r($url);
  echo "</pre>";

  $route = array();
  $url = explode("/", $url);

echo "<pre>";
print_r($url);
echo "</pre>";

  // TODO: resolver cuando tengas mas tecnologia disponible
  $controllers = array('web'=>array('home'),
                       'login'=>array('login'),
                       'error'=>array('404'),
                       'users'=>array('insert','update','delete','select'),
  );

  $route['module']='default';
  $error = 0;
  if(is_dir("../modules/".ucfirst($url[1])))
  {
    $route['module']=$url[1];
  }
  else
  {
    $error = 1;
  }

  $controllerDir = "../modules/".ucfirst($url[1])."/src/".
                                 ucfirst($url[1])."/Controller/".
                                 @ucfirst($url[2])."Controller.php";

  // echo is_file($controllerDir);

  // if ( $error!=1 && isset($url[2]) && in_array($url[2], array_keys($controllers)))
  if ( $error!=1 && isset($url[2]) && is_file($controllerDir))
  {
    $route['controller']=$url[2];
  }
  elseif(@$url[2]!='')
  {
    $error=1;
  }

  if(@$url[2]!='' && $error!=1 && isset($url[3]) && in_array($url[3], $controllers[$url[2]]))
  {
    $route['controller']=$url[2];
    $route['action']=$url[3];
  }
  elseif(!isset($url[3]))
  {
    $route['controller']=@$url[2];
    $route['action']='';
  }
  else
  {
    $error=1;
  }

  if($error!=1 && (sizeof($url)%2)==0 && $url[sizeof($url)-1]!='')
  {
    $route['controller']=$url[2];
    $route['action']=$url[3];
    for($i=4;$i<sizeof($url);$i+=2)
      $route['params'][$url[$i]]=$url[$i+1];
  }
  elseif(isset($url[3]))
  {
    $error=1;
  }

  if($error==1)
  {
    $route['module']='error';
    $route['controller']='error';
    $route['action']='404';
    $route['params']=array();
  }

  echo "<pre>";
  print_r($route);
  echo "</pre>";

  return $route;
}
