<?php
require_once("autoload.php");

use Cervezza\Utils\FrontControllerView;

$config = FrontControllerView::Config();

// echo "<pre>config: ";
// print_r($config);
// echo "</pre>";

$route = FrontControllerView::Router($_SERVER['REQUEST_URI']);

// echo "<pre>route: ";
// print_r($route);
// echo "</pre>";

$content = FrontControllerView::Dispatch($route, $config);
$content = FrontControllerView::Twosteps($content['layout'], $content['view'], $config);

// include_once('../vendor/Cervezza/Loquesea/Carpeta1/Carpeta2/Cosa.php');
// include_once('../vendor/Cervezza/Loquesea/Carpeta1/Carpeta2/Casa.php');

echo $content;
