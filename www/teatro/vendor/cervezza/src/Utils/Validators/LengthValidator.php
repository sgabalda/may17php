<?php
namespace Cervezza\Utils\Validators;

class LengthValidator{
  private $maxlength;
  private $text;

  public function __construct($text,$maxlength){
    $this->text=$text;
    $this->maxlength=$maxlength;
  }

  public function check(){
    if(strlen($this->text)>$this->maxlength){
      return false;
    }else{
      return true;
    }
  }

}

 ?>
