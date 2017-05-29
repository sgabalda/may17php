<?php

function __autoload($class)
{

    $class = explode("\\", $class);
    $first = $class[0];
    unset($class[0]);
    $second = $class[1];
    unset($class[1]);

    $path = implode("\\", $class);

    // echo $path;
    // echo $first;
    $onModules = "../modules/".$first."/src/".$first."/".$second."/".$path.".php";
    $onVendor = "../vendor/".$first."/".$second."/src/".$second."/".$path.".php";

    if(file_exists($onModules))
      include $onModules;
    elseif(file_exists($onVendor))
      include $onVendor;
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
