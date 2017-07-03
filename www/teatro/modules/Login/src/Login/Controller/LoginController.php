<?php

namespace Login\Controller;

use Cervezza\Utils\LoginValidator;
use Cervezza\Utils\Helpers\ViewHelpers;
use Users\Model\DataMapping\User;

class LoginController extends \Cervezza\Utils\Abstracts\Routeable{

  public $layout = "../modules/Users/src/views/layouts/layout.phtml";

  public function loginAction($config){

    if(LoginValidator::isUserLogged()){
      //header("Location: ".LoginValidator::getRedirectUrl());
    }else{
      //mostrar formulario o añadir a SESSION
      $showFrom=TRUE;
      if(isset($_POST)){
        if(isset($_POST["email"]) && isset($_POST["password"])){
          //echo password_hash($_POST["password"],PASSWORD_DEFAULT);
          if(LoginValidator::logUser($_POST["email"],$_POST["password"])){
            header("Location: ".LoginValidator::getRedirectUrl());
            $showFrom=FALSE;
          }
        }
      }

      if($showFrom){
        //mostrar formulario
        $data=[];
        $data["form"]="../modules/Users/src/Users/Model/Forms/login.json";
        $content = ViewHelpers::RenderView($this->router, $data);
        return array($data,$content);
      }
    }

  }

  public function logoutAction($config){
    LoginValidator::logoutUser();
    header("Location: /login/login/login");
  }

  public function indexAction(){}

}

 ?>
