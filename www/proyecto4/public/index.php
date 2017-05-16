<?php

require("../vendor/cervezza/FormGenerator/src/FormGenerator/Model/formGenerator.php");

// echo $_SERVER['DOCUMENT_ROOT'];


$html = formGenerator("../modules/UserRegister/src/UserRegister/Model/Forms/user.json");
// $html = formGenerator("../modules/UserRegister/src/UserRegister/Model/Forms/login.json");






// echo "<pre>";
// print_r($html);
// echo "</pre>";

echo $html;
