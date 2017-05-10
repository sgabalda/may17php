<?php

/**
* Function to create an array with fibonacci until max
* int max
* array fibo array with fibonacci
**/

function fibonacci($max)
{
  $fibo = array();  // definicion de array vacio
  $n=0;
  $n1=1;
  
  $fibo[]=$n;
  $fibo[]=$n1;

  $n2 = ($n+$n1);
  while ($max>=($n2))
  {
    $fibo[]=$n2;

    $n = $n1;
    $n1 = $n2;
    $n2 = $n+$n1;
  }
  return $fibo;
}
