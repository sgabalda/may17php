<?php

// include_once('../vendor/cervezza/Utils/src/Utils/FrontControllerView.php');

$config = FrontControllerView::Config();
// $route = FrontControllerView::Router($_SERVER['REQUEST_URI']);
// $content = FrontControllerView::Dispatch($route, $config);
// $content = FrontControllerView::Twosteps($content['layout'], $content['view'], $config);

// include_once('../vendor/Cervezza/Loquesea/Carpeta1/Carpeta2/Cosa.php');
// include_once('../vendor/Cervezza/Loquesea/Carpeta1/Carpeta2/Casa.php');

require_once("autoload.php");

$obj = new Cervezza\Loquesea\Carpeta1\Carpeta2\Cosa();
$obj2 = new Loquesea\Carpeta1\Carpeta2\Casa();

$obj->haceAlgo();
