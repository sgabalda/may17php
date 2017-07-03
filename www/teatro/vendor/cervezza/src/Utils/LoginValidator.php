<?php
namespace Cervezza\Utils;

use Users\Model\DataMapping\User;

class LoginValidator{

  private static $SESSION_USER_VAR="current_user_logged";
  private static $SESSION_PAGE_SUCCESS_VAR="page_success_login";
  private static $LOGIN_PAGE="/login/login/login";

  public static function isUserLogged(){
    if(isset($_SESSION[self::$SESSION_USER_VAR])){
      return $_SESSION[self::$SESSION_USER_VAR];
    }else{
      return FALSE;
    }
  }

  public static function needsLogin($page){
    $user_logged=self::isUserLogged();
    if($user_logged){
      echo "user logged";
      return $user_logged;
    }else{
      $_SESSION[self::$SESSION_PAGE_SUCCESS_VAR]=$page;
      header("Location: ".self::$LOGIN_PAGE);
    }
  }

  public static function getRedirectUrl(){
    return $_SESSION[self::$SESSION_PAGE_SUCCESS_VAR];
  }

  public static function logUser($email, $password){
    $userObj=new User();
    try{
      $userObj->loadFromEmailAndPassw($_POST["email"]);
      if(password_verify($_POST["password"],$userObj->password)){
        $_SESSION[self::$SESSION_USER_VAR]=$userObj->id;
        return $userObj->id;
      }else{
        return FALSE;
      }
    }catch(\Exception $e){
      return FALSE;
    }
  }

  public static function logoutUser(){
    unset($_SESSION[self::$SESSION_USER_VAR]);
    session_destroy();
  }

}
 ?>
