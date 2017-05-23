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
  $route = array();
  $url = explode("/", $url);

echo "<pre>";
print_r($url);
echo "</pre>";

  $controllers = array('web'=>array('home'),
                       'login'=>array('login'),
                       'error'=>array('404'),
                       'users'=>array('insert','update','delete','select'),
  );

  $route['module']='default';
  $error = 0;

  if (isset($url[1]) && in_array($url[1], array_keys($controllers)))
  {
    $route['controller']=$url[1];
  }
  elseif($url[1]!='')
  {
    $error=1;
  }

  if($url[1]!='' && $error!=1 && isset($url[2]) && in_array($url[2], $controllers[$url[1]]))
  {
    $route['controller']=$url[1];
    $route['action']=$url[2];
  }
  elseif(!isset($url[2]))
  {
    $route['controller']=$url[1];
    $route['action']='';
  }
  else
  {
    $error=1;
  }

  if($error!=1 && (sizeof($url)%2)==1 && $url[sizeof($url)-1]!='')
  {
    $route['controller']=$url[1];
    $route['action']=$url[2];
    for($i=3;$i<sizeof($url);$i+=2)
      $route['params'][$url[$i]]=$url[$i+1];
  }
  elseif(isset($url[2]))
  {
    $error=1;
  }

  if($error==1)
  {
    $route['controller']='error';
    $route['action']='404';
    $route['params']=array();
  }

  return $route;
}
