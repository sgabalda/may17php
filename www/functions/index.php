<?php

require('tablaMultiplicar.php');
require('fibonacci.php');
require('dibujaTabla.php');

$miTabla = tablaMultiplicar(3,6);
if(!is_array($miTabla))
  die("NO ARRAY");

$miFibo = fibonacci(40);
if(!is_array($miFibo))
    die("NO ARRAY");

// $html = dibujaTabla($miTabla);
$html = dibujaTabla($miFibo);
if(!is_string($html))
  die("NO STRING");


// echo "<pre>";
// print_r($miFibo);
// echo "</pre>";

// echo "<pre>";
// print_r($miTabla);
// echo "</pre>";

// echo "<pre>";
// print_r($html);
// echo "</pre>";

echo dibujaTabla($miTabla);
echo dibujaTabla($miFibo);
