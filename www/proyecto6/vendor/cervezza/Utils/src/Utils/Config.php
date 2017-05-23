<?php

/**
 * Merge config global & config local
 * return array config
 */

function Config()
{
  $config=array();

  $directorio = '../settings';
  $ficheros1  = scandir($directorio);


  foreach ($ficheros1 as $value)
  {
    if(is_file($directorio."/".$value))
    {
      $config = array_merge($config, include_once($directorio."/".$value));

    }
  }


  echo "<pre>ficheros:";
  print_r($ficheros1);
  echo "</pre>";



  return $config;
}
