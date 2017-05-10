<?php

require('tablaMultiplicar.php');
// require('dibujaMatrix.php');

$miTabla = tablaMultiplicar(3,6);

if(!is_array($miTabla))
  die("NO ARRAY");

$html = dibujaTabla($miTabla);

echo $html;

echo "<pre>";
print_r($miTabla);
echo "</pre>";
//echo dibujaMatrix($miTabla);
