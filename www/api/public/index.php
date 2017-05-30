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

$dispatch = FrontControllerView::Dispatch($route, $config);
$dispatch['content'] = FrontControllerView::Twosteps($dispatch['layout'], $dispatch['view'], $config);


FrontControllerView::Render('html',$dispatch);
