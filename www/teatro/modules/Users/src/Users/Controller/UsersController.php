<?php
namespace Users\Controller;

use Cervezza\DataManagement\Model\DataManagementCsv;
use Cervezza\DataManagement\Model\DataManagementDB;
use Cervezza\Utils\Helpers\ViewHelpers;
use Cervezza\Utils\LoginValidator;
use Cervezza\Utils\Validators\InputValidatorCoordinator;

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
      $_POST["password"]=password_hash($_POST["password"],PASSWORD_DEFAULT);
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

    $userLogged=LoginValidator::needsLogin($_SERVER['REQUEST_URI']);
    if($userLogged){

      $isFormSubmission=FALSE;
      $errors=array();
      if($_POST){
        $isFormSubmission=TRUE;
        //validate input
        $validator=new InputValidatorCoordinator($_POST,
          "../modules/Users/src/Users/Model/Forms/user.json");
          //forget about POST and GET
        $validator->validateInput();

        $errors=$validator->getErrors();
        $cleanData=$validator->getClean();

      }

      if($isFormSubmission && empty($errors))
      {
        $cleanData["password"]=password_hash($cleanData["password"],PASSWORD_DEFAULT);

        $userOb=new User();
        $userOb->load($cleanData['iduser']);

        //TODO filter and validate input
        $userOb->fromArray($cleanData);

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
        $data['errors']=$errors;
        $content = ViewHelpers::RenderView($this->router, $data);
        return array($data,$content);
      }
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
