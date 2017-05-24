<?php

include_once('../vendor/cervezza/Utils/src/Utils/Config.php');
include_once('../vendor/cervezza/Utils/src/Utils/Router.php');
include_once('../vendor/cervezza/Utils/src/Utils/Dispatch.php');
include_once('../vendor/cervezza/Utils/src/Utils/Twosteps.php');

$config = Config();
$route = Router($_SERVER['REQUEST_URI']);
$content = Dispatch($route, $config);
$content = Twosteps($content['layout'], $content['view']);

echo $content;


// echo "On maintenance";
