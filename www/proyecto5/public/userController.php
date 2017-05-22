<?php

echo "<pre>GET: ";
print_r($_GET);
echo "</pre>";

echo "<pre>POST: ";
print_r($_POST);
echo "</pre>";

require('../vendor/cervezza/Utils/src/Utils/dibujaTabla.php');
require('../vendor/cervezza/FormGenerator/src/FormGenerator/Model/formGenerator.php');

require('../vendor/cervezza/DataManagement/src/DataManagement/Model/Csv/getDatas.php');


if(isset($_GET['action']))
  $action = $_GET['action'];
else
  $action = 'select';

$usersFilename = '../modules/UserRegister/src/UserRegister/Model/Data/users.txt';

switch ($action)
{
  case 'select':
    echo "<a href=\"/userController.php?action=insert\">Insert</a>";
    $users = getDatas($usersFilename);
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
    if($_POST)
    {
        $users = file_get_contents($usersFilename);
        $users = explode ("\n", $users);
        $user=array();
        foreach ($_POST as $key => $value)
        {
          if(is_array($value))
            $user[]=implode("|", $value);
          else
            $user[]=$value;
        }
        $user = implode(",", $user);
        $users[$_POST['iduser']]=$user;
        $users = implode("\n",$users);
        file_put_contents($usersFilename, $users);
        header("Location: /userController.php?action=select");
    }
    else
    {
      $users = file_get_contents($usersFilename);
      $users = explode("\n", $users);
      $user = $users[$_GET['iduser']];
      $user = explode(",",$user);

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

      $html = formGenerator($form, $user, "POST", "userController.php?action=update");
      echo $html;
    }
  break;
  case 'delete':
    echo "esto es delete";
    $form = "../modules/UserRegister/src/UserRegister/Model/Forms/delete.json";
    if($_POST)
    {
        if($_POST['enviar']=='Si')
        {
          echo "borrar";
          $users = file_get_contents($usersFilename);
          $users = explode("\n", $users);
          unset($users[$_POST['iduser']]);
          $users = implode("\n", $users);
          file_put_contents($usersFilename, $users);
          header("Location: /userController.php?action=select");
        }
        else
          header("Location: /userController.php?action=select");
    }
    else
    {
      $html = formGenerator($form, $_GET);
      echo $html;
    }
  break;
  default:
    echo "error 404";
  break;
}
