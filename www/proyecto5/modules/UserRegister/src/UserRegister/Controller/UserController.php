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

if(isset($_GET['action']))
  $action = $_GET['action'];
else
  $action = 'select';

$usersFilename = '../modules/UserRegister/src/UserRegister/Model/Data/users.txt';

switch ($action)
{
  case 'select':
    $users = GetDatas($usersFilename);
    ob_start();
      include_once("../modules/UserRegister/src/views/UserRegister/select.phtml");
      $content = ob_get_contents();
    ob_end_clean();

  break;

  case 'insert':
    $form = "../modules/UserRegister/src/UserRegister/Model/Forms/user.json";
    if($_POST)
    {
      SetData($usersFilename, $_POST);
      header("Location: /userController.php?action=select");
    }
    else
    {
      ob_start();
        include_once("../modules/UserRegister/src/views/UserRegister/insert.phtml");
        $content = ob_get_contents();
      ob_end_clean();
    }
  break;
  case 'update':
    if($_POST)
    {
        UpdateData($usersFilename, $_POST, $_POST['iduser']);
        header("Location: /userController.php?action=select");
    }
    else
    {
      $user = GetData($usersFilename, $_GET['iduser']);

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
      $user['iduser']=$_GET['iduser'];
      $user['description']=$user[10];
      $user['photo']=$user[11];
      $user['enviar']=$user[12];

      $form = "../modules/UserRegister/src/UserRegister/Model/Forms/user.json";
      ob_start();
        include_once("../modules/UserRegister/src/views/UserRegister/update.phtml");
        $content = ob_get_contents();
      ob_end_clean();
    }
  break;
  case 'delete':
    $form = "../modules/UserRegister/src/UserRegister/Model/Forms/delete.json";
    if($_POST)
    {
        if($_POST['enviar']=='Si')
        {
          DeleteData($usersFilename,$_POST['iduser']);
          header("Location: /userController.php?action=select");
        }
        else
          header("Location: /userController.php?action=select");
    }
    else
    {
      $user = GetData($usersFilename, $_GET['iduser']);
      ob_start();
        include_once("../modules/UserRegister/src/views/UserRegister/delete.phtml");
        $content = ob_get_contents();
      ob_end_clean();
    }
  break;
  default:
    ob_start();
      echo "error 404";
      $content = ob_get_contents();
    ob_end_clean();
  break;
}

include_once("../modules/UserRegister/src/views/layouts/layout.phtml");
