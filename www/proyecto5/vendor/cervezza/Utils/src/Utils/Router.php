<?php

/**
 * Set route from url
 * string url
 * array route
 */

function Router($url='/')
{
  $route = array();
  $url = explode("/", $url);


  echo "<pre>";
  print_r($url);
  echo "</pre>";

  $router['module']='default';
  $router['module']='default';
  $router['module']='default';
  $router['module']='default';

  $router=array('module'=>'default',
                'controller'=>'users',
                'action'=>'delete',
                'params'=>array('param1'=>'val1',
                                'param1'=>'val1',
                                'param1'=>'val1')
  );
  echo "<pre>";
  print_r($router);
  echo "</pre>";


  return $route;
}
