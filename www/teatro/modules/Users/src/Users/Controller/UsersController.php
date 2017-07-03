<?php
namespace Users\Controller;

use Cervezza\DataManagement\Model\DataManagementCsv;
use Cervezza\DataManagement\Model\DataManagementDB;
use Cervezza\Utils\Helpers\ViewHelpers;

use Users\Model\DataMapping\User;


class UsersController extends \Cervezza\Utils\Abstracts\Routeable
{
  public $layout = "../modules/Users/src/views/layouts/layout.phtml";

  private function getNumVisits(){
    if(isset($_COOKIE["numvisits"])){
      //$_COOKIE["numvisits"]=$_COOKIE["numvisits"]+1;
      $numvisits=$_COOKIE["numvisits"]+1;
    }else{
      $numvisits=1;
    }
    echo session_save_path();
    setcookie('numvisits',$numvisits,time()+2*24*60*60,"/");

    session_start();
    if(isset($_SESSION['numvisits_session'])){
      $_SESSION['numvisits_session']=$_SESSION['numvisits_session']+1;
    }else{
      $_SESSION['numvisits_session']=1;
    }

    return $numvisits;
  }

  public function indexAction($config)
  {
    header("Location: /users/users/select");
  }

  public function selectAction($config)
  {
    $data=[];
    $data['users'] = DataManagementDB::GetDatas($config);
    $data["numvisits"]=$this->getNumVisits();
    $data["numvisits_session"]=$_SESSION['numvisits_session'];
    $content = ViewHelpers::RenderView($this->router, $data);
    return array($data,$content);
  }

  public function insertAction($config)
  {
    $data=[];
    $data['form']="../modules/Users/src/Users/Model/Forms/user.json";

    if($_POST)
    {
        //validate form input and filter data
      DataManagementDB::SetData($config, $_POST);
      //header("Location: /users/users/select");
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
      $userOb=new User();
      $userOb->load($_POST['iduser']);

      //TODO filter and validate input
      $userOb->fromArray($_POST);

      $userOb->save();
        //DataManagementCsv::UpdateData($config['users']['usersFilename'], $_POST, $_POST['iduser']);
      header("Location: /users/users/select");
    }
    else
    {
      //$user = DataManagementDB::GetData($config, $this->router['params']['iduser']);
      $userOb=new User();
      $userOb->load($this->router['params']['iduser']);

      $user=$userOb->toArray();
      $user['iduser']=$this->router['params']['iduser'];

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
          DataManagementDB::DeleteData($config,$_POST['iduser']);
          header("Location: /users/users/select");
        }
        else
          header("Location: /users/users/select");
    }
    else
    {
      $data=[];
      $data['users']=DataManagementDB::GetData($config, $this->router['params']['iduser']);
      $data['form']=$form;
      $data['params']=$this->router['params'];
      $content = ViewHelpers::RenderView($this->router, $data);
      return array($data,$content);
    }
  }

}
