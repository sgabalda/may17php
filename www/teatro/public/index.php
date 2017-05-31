<?php
require_once("spl_autoload_modules.php");
require_once("spl_autoload_vendor.php");

use Cervezza\Utils\FrontControllerView;

$config = FrontControllerView::Config();
$route = FrontControllerView::Router($_SERVER['REQUEST_URI']);
$dispatch = FrontControllerView::Dispatch($route, $config);
$dispatch['content'] = FrontControllerView::Twosteps($dispatch['layout'], $dispatch['view'], $config);
FrontControllerView::Render($config['config']['context'],$dispatch);
