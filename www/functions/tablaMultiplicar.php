<?php
/**
tablaMultiplicar($filas, $columnas)

int $filas
int $columnas
array $tabla matriz de multiplicacion

*/
function tablaMultiplicar($filas, $columnas)
{
  $tabla = array();
  for($i=0;$i<=$filas;$i++)
  {
    for ($z=0;$z<=$columnas;$z++)
    {
      if($i==0)
        $tabla[$i][$z]=$z;
      else if ($z==0)
        $tabla[$i][$z]=$i;
      else
        $tabla[$i][$z]=$i*$z;
    }
  }
  return "a";
  return $tabla;
}
