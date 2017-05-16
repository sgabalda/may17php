<?php

$name = "Sebastian";
echo "\t<p>";
echo "\t\tAgustin y las comillas \"\" \n\r";
// echo "<br/>";
echo "\tCalderon";
echo "\t</p>";

echo $name;

echo $name[5];


echo "<pre>";
print_r($_SERVER);
echo "</pre>";

echo $_SERVER['DOCUMENT_ROOT'];


echo "Hola " . $name;

echo '$name';

echo $name;


echo "<hr/>";

define ('NAME', "benjamin");

echo @name;
echo NAME;

echo "<hr/>";
echo "<hr/>";

echo 3<<2;
echo "<hr/>";
echo 3>>6;

echo "<hr/>";
echo "<hr/>";

$a = 8;
$b = 5;
echo "esto es a: ".$a;
echo "esto es b: ".$b;

echo "<hr/>";
$a=&$b;
echo "<hr/>";
echo "esto es a: ".$a;
echo "esto es b: ".$b;
