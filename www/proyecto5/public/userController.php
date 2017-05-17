<?php

echo "<pre>GET: ";
print_r($_GET);
echo "</pre>";

echo "<pre>POST: ";
print_r($_POST);
echo "</pre>";

require('../vendor/cervezza/Utils/src/Utils/dibujaTabla.php');
require('../vendor/cervezza/FormGenerator/src/FormGenerator/Model/formGenerator.php');


if(isset($_GET['action']))
  $action = $_GET['action'];
else
  $action = 'select';

$usersFilename = '../modules/UserRegister/src/UserRegister/Model/Data/users.txt';

switch ($action)
{
  case 'select':
    echo "esto es select";
    echo "<a href=\"/userController.php?action=insert\">Insert</a>";
    $users = file_get_contents($usersFilename);
    $users = explode("\n", $users);
    foreach($users as $key => $user)
        $users[$key]=explode(',', $user);
    $html = dibujaTabla($users);
    echo $html;
  break;
  case 'insert':
    echo "esto es insert";
    $form = "../modules/UserRegister/src/UserRegister/Model/Forms/user.json";
    if($_POST)
    {
      // Procesar formulario
      echo "<pre>procesar esto: ";
      $line = array();
      foreach($_POST as $value)
      {
            if(!is_array($value))
                $line[]= $value;
            else
                $line[]= implode('|',$value);
      }
      $line = implode(',', $line)."\n";
      file_put_contents($usersFilename, $line, FILE_APPEND);
      header("Location: /userController.php?action=select");
    }
    else
    {
      $html = formGenerator($form);
      echo $html;
    }
  break;
  case 'update':
    echo "esto es update";
  break;
  case 'delete':
    echo "esto es delete";
  break;
  default:
    echo "error 404";
  break;
}
