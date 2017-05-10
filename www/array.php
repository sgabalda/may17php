<?php


$user = array(
    "name"=>"agustin",
    "apellidso"=>"ss",
    "email"=>"email@gmail.com",
    "index1"=>"val1",
    "index4"=>"val4",
    "index5"=>array("otro"=>"masvalor"),
    "direccion"=>array("calle", "numero", "puerta"),
    14=>"kaka",
    15=>"maskaka",
    19=>"kaka3",
    "kaka4",
    "kak28",
    "gato",
    40=>"jajja",
    "jojojo",
    13,6=>"ostia",
    "mas ostias",
    "90"=>FALSE,
    TRUE=>"akka4329",
    "lerorlerl",
    "eeee",
    17.8=>"puñetero",
    17=>"kikiki",
);

$user["apellido"]="calderon";


foreach($user as $key=>$value)
{
  echo $key.": ".$value;
  echo "<br/>";
}

foreach ($user as $value)
{
  echo $value;
  echo "<br/>";
}


foreach ($user as $kaka)
{
  echo $kaka;
  echo "<br/>";
}


echo "<pre>";
print_r($user);
echo "</pre>";
