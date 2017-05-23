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

  $router['module']='default';

  $router['controller']=$url[1];
  $router['action']=$url[2];
  $router['params']=array($url[3]=>$url[4]);

  // $router=array('module'=>'default',
  //               'controller'=>'users',
  //               'action'=>'delete',
  //               'params'=>array('param1'=>'val1',
  //                               'param1'=>'val1',
  //                               'param1'=>'val1')
  // );
  echo "<pre>";
  print_r($router);
  echo "</pre>";


  return $route;
}
