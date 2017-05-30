<?php
require_once("autoload.php");

use Cervezza\Utils\FrontControllerView;

$config = FrontControllerView::Config();
$route = FrontControllerView::Router($_SERVER['REQUEST_URI']);
$dispatch = FrontControllerView::Dispatch($route, $config);
$dispatch['content'] = FrontControllerView::Twosteps($dispatch['layout'], $dispatch['view'], $config);
FrontControllerView::Render($config['config']['context'],$dispatch);
