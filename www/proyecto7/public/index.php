<?php

// include_once('../vendor/cervezza/Utils/src/Utils/FrontControllerView.php');

// $config = FrontControllerView::Config();
// $route = FrontControllerView::Router($_SERVER['REQUEST_URI']);
// $content = FrontControllerView::Dispatch($route, $config);
// $content = FrontControllerView::Twosteps($content['layout'], $content['view'], $config);

// include_once('../vendor/Cervezza/Loquesea/Carpeta1/Carpeta2/Cosa.php');
// include_once('../vendor/Cervezza/Loquesea/Carpeta1/Carpeta2/Casa.php');

$obj = new Cervezza\Loquesea\Carpeta1\Carpeta2\Cosa();
$obj2 = new Cervezza\Loquesea\Carpeta1\Carpeta2\Casa();

echo "<pre>methods: ";
print_r(get_class_methods($obj));
echo "</pre>";

echo "<pre>methods: ";
print_r(get_class_methods($obj2));
echo "</pre>";


function __autoload($obj)
{
  echo "<pre>En auto: ";
  print_r($obj);
  echo "</pre>";

  $path = explode("\\", $obj);
  echo "<pre>En auto: ";
  print_r($path);
  echo "</pre>";

  echo "<pre>";
  print_r(get_class_methods($obj));
  echo "</pre>";


}

// echo $content;


// echo "On maintenance";
