<?php
namespace Users\Controller;

use Cervezza\DataManagement\Model\DataManagementCsv;
use Cervezza\Utils\Helpers\ViewHelpers;


class UsersController extends \Cervezza\Utils\Abstracts\Routeable
{
  public $layout = "../modules/Users/src/views/layouts/layout.phtml";

  public function indexAction($config)
  {
    header("Location: /users/users/select");
  }

  public function selectAction($config)
  {
    $data=[];
    $data['users'] = DataManagementCsv::GetDatas($config['users']['usersFilename']);
    $content = ViewHelpers::RenderView($this->router, $data);
    return array($data,$content);
  }

  public function insertAction($config)
  {
    $data=[];
    $data['form']="../modules/Users/src/Users/Model/Forms/user.json";

    if($_POST)
    {
      DataManagementCsv::SetData($config['users']['usersFilename'], $_POST);
      header("Location: /users/users/select");
    }
    else
    {
      $content = ViewHelpers::RenderView($this->router,$data);
      return array($data,$content);
    }
  }

  public function updateAction($config)
  {
    if($_POST)
    {
        DataManagementCsv::UpdateData($config['users']['usersFilename'], $_POST, $_POST['iduser']);
        header("Location: /users/users/select");
    }
    else
    {
      $user = DataManagementCsv::GetData($config['users']['usersFilename'], $this->router['params']['iduser']);

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
      $user['iduser']=$this->router['params']['iduser'];
      $user['description']=$user[10];
      $user['photo']=$user[11];
      $user['enviar']=$user[12];

      $data=[];
      $data['user']=$user;
      $data['form'] = "../modules/Users/src/Users/Model/Forms/user.json";
      $content = ViewHelpers::RenderView($this->router, $data);
      return array($data,$content);
    }
  }

  public function deleteAction($config)
  {
    $form = "../modules/Users/src/Users/Model/Forms/delete.json";
    if($_POST)
    {
        if($_POST['enviar']=='Si')
        {
          DataManagementCsv::DeleteData($config['users']['usersFilename'],$_POST['iduser']);
          header("Location: /users/users/select");
        }
        else
          header("Location: /users/users/select");
    }
    else
    {
      $data=[];
      $data['users']=  DataManagementCsv::GetData($config['users']['usersFilename'], $this->router['params']['iduser']);
      $data['form']=$form;
      $data['params']=$this->router['params'];
      $content = ViewHelpers::RenderView($this->router, $data);
      return array($data,$content);
    }
  }

}
