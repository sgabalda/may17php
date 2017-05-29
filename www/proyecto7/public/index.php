<?php

include_once('../vendor/cervezza/Utils/src/Utils/FrontControllerView.php');

// $config = FrontControllerView::Config();
// $route = FrontControllerView::Router($_SERVER['REQUEST_URI']);
// $content = FrontControllerView::Dispatch($route, $config);
// $content = FrontControllerView::Twosteps($content['layout'], $content['view'], $config);




function __autoload($class)
{
  echo "<pre>";
  print_r($class);
  echo "</pre>";

  echo "<pre>";
  print_r(get_class_methods($class));
  echo "</pre>";

  die("----------");
}

// echo $content;


// echo "On maintenance";
