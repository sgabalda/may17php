<?php

require("formGenerator.php");


$html = formGenerator("user.json");
// $html = formGenerator("login.json");


// echo "<pre>";
// print_r($html);
// echo "</pre>";

echo $html;
