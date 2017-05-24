<?php

echo "<pre>GET: ";
print_r($_GET);
echo "</pre>";

echo "<pre>POST: ";
print_r($_POST);
echo "</pre>";

require('../vendor/cervezza/Utils/src/Utils/dibujaTabla.php');
require('../vendor/cervezza/FormGenerator/src/FormGenerator/Model/formGenerator.php');

require('../vendor/cervezza/DataManagement/src/DataManagement/Model/Csv/GetDatas.php');
require('../vendor/cervezza/DataManagement/src/DataManagement/Model/Csv/GetData.php');
require('../vendor/cervezza/DataManagement/src/DataManagement/Model/Csv/DeleteData.php');
require('../vendor/cervezza/DataManagement/src/DataManagement/Model/Csv/SetData.php');
require('../vendor/cervezza/DataManagement/src/DataManagement/Model/Csv/UpdateData.php');

$actions = ['insert', 'select', 'update', 'delete'];


switch ($route['action'])
{
  default:
  case 'select':
    $users = GetDatas($config['users']['usersFilename']);
    ob_start();
      include_once("../modules/Users/src/views/Users/select.phtml");
      $content = ob_get_contents();
    ob_end_clean();

  break;

  case 'insert':
    $form = "../modules/Users/src/Users/Model/Forms/user.json";
    if($_POST)
    {
      SetData($config['users']['usersFilename'], $_POST);
      header("Location: /users/select");
    }
    else
    {
      ob_start();
        include_once("../modules/Users/src/views/Users/insert.phtml");
        $content = ob_get_contents();
      ob_end_clean();
    }
  break;
  case 'update':
    if($_POST)
    {
        UpdateData($config['users']['usersFilename'], $_POST, $_POST['iduser']);
        header("Location: /users/select");
    }
    else
    {
      $user = GetData($config['users']['usersFilename'], $route['params']['iduser']);

      $user['name']=$user[0];
      $user['lastname']=$user[1];
      $user['email']=$user[2];
      $user['bdate']=$user[3];
      $user['gender']=$user[4];
      $user['transport']=$user[5];
      $user['city']=$user[6];
      $user['hobbies']=$user[7];
      $user['password']=$user[8];
      // $user['iduser']=$user[9];
      $user['iduser']=$route['params']['iduser'];
      $user['description']=$user[10];
      $user['photo']=$user[11];
      $user['enviar']=$user[12];

      $form = "../modules/Users/src/Users/Model/Forms/user.json";
      ob_start();
        include_once("../modules/Users/src/views/Users/update.phtml");
        $content = ob_get_contents();
      ob_end_clean();
    }
  break;
  case 'delete':
    $form = "../modules/Users/src/Users/Model/Forms/delete.json";
    if($_POST)
    {
        if($_POST['enviar']=='Si')
        {
          DeleteData($config['users']['usersFilename'],$_POST['iduser']);
          header("Location: /users/select");
        }
        else
          header("Location: /users/select");
    }
    else
    {
      $user = GetData($config['users']['usersFilename'], $route['params']['iduser']);
      ob_start();
        include_once("../modules/Users/src/views/Users/delete.phtml");
        $content = ob_get_contents();
      ob_end_clean();
    }
  break;

}

include_once("../modules/Users/src/views/layouts/layout.phtml");
