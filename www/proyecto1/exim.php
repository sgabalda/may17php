<?php


$array=array("1,23,4,65,5,76,4,53,23,2,2332,2,3,2,2,34,23");
echo $array[0];
$ex = explode(',', $array[0]);

$im = implode('|', $ex);

echo "<pre>";
print_r($ex);
echo "</pre>";

echo "<pre>";
print_r($im);
echo "</pre>";
