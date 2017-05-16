<?php

$filename = 'user.txt';

// Leer los datos del archivo en un string
$users = file_get_contents($filename);

// Separar por saltos de linea el string en un array
$users = explode("\n", $users);

$matriz = array();
// Para cada elemento del array
foreach($users as $key => $user)
{
    //Separ la fila por comas
    $matriz[]=explode(',', $user);
}

// llamar a dibuja tabla con la matriz
// echo "<pre>";
// print_r($matriz);
// echo "</pre>";

echo "<a href=\"http://proyecto4.local\">Insert</a>";
require('../vendor/cervezza/Utils/src/Utils/dibujaTabla.php');


$html = dibujaTabla($matriz);


echo $html;
