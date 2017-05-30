<?php

function __autoload($class)
{

  // echo "<pre>AUTOLOAD: ";
  // print_r($class);
  // echo "</pre>";


    $class = explode("\\", $class);

    // echo "<pre>pre: ";
    // print_r($class);
    // echo "</pre>";


    $first = $class[0];
    unset($class[0]);
    $second = $class[1];
    unset($class[1]);

    $path = implode("\\", $class);

    $onModules = "../modules/".$first."/src/".$first."/".$second."/".$path.".php";
    $onVendor = "../vendor/".$first."/".$second."/src/".$second."/".$path.".php";

    // echo $onVendor;
    // echo "-----";
    // echo $first;
    // echo "----->";
    // echo $second;
    // echo "<br/>";
    // echo "<br/>";


    if(file_exists($onModules))
      include_once $onModules;
    elseif(file_exists($onVendor))
      include_once $onVendor;
    else
    {
      echo "<pre>On Modules: ";
      print_r($onModules);
      echo "</pre>";
      echo "<pre>On Vendor: ";
      print_r($onVendor);
      echo "</pre>";

      die("ERROR 500: Call to undefined class on autoload.");
    }

}
