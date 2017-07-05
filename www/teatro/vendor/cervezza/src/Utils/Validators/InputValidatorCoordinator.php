<?php

namespace Cervezza\Utils\Validators;

class InputValidatorCoordinator{

  private $raw;
  private $clean;
  private $errors;

  private $form;

  public function __construct($data=FALSE,$form){
    $this->form=$form;
    $this->raw=$data?$data:$this->initFromHttp();

    unset($_POST);
    unset($_GET);
    unset($_REQUEST);

    $this->errors=array();
    $this->clean=array();

  }

  private function initFromHttp(){
    if(!empty($_POST)) return $_POST;
    if(!empty($_GET)) return $_GET;
    return array();
  }

  public function getClean(){
    return $this->clean;
  }
  public function getErrors(){
    return $this->errors;
  }

  public function validateInput(){
    $jsonForm = file_get_contents($this->form);
    $jsonArray = json_decode($jsonForm, true);

    foreach($jsonArray['elements'] as $element)
    {
      if(isset($element["validations"])){
        foreach($element["validations"] as $validation =>$validationValue){
          switch($validation){
            case 'required':
              if($validationValue){
                if(!isset($this->raw[$element["name"]])){
                  $this->errors[$element["name"]]="Required!";
                }
              }
            break;
            case 'type':
              if($validationValue){
                if(!filter_var($this->raw[$element["name"]],FILTER_VALIDATE_EMAIL)){
                  $this->errors[$element["name"]]="Email no valido!";
                }
              }
            break;
          }
        }
      }
      if(isset($element["filters"])){
        foreach($element["filters"] as $filter =>$filterValue){
          switch($filter){
            case 'striptag':
              if($filterValue){
                $this->raw[$element["name"]]=strip_tags($this->raw[$element["name"]],$filterValue===TRUE?"":$filterValue);
              }
            break;
          }
        }
      }else{
        if($element["type"]=='text'){
          $this->raw[$element["name"]]=strip_tags($this->raw[$element["name"]]);
        }
      }
      $this->clean[$element["name"]]=$this->raw[$element["name"]];
    }

  }

}
 ?>
