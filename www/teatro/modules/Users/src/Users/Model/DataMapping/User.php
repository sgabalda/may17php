<?php

namespace Users\Model\DataMapping;

class User{

  private $id;
  private $name;
  private $lastname;
  private $email;
  private $bdate;
  private $transport;

  private $userDataMapper;

  public function __construct(){
    $this->userDataMapper=new UserDataMapper();
  }

  public function __get($property){
    if(property_exists($this,$property)){
      return $this->$property;
    }
  }

  public function __set($property,$value){
    if(property_exists($this,$property)){
      $this->$property=$value;
    }
  }

  public function load($id){
    $this->userDataMapper->load($this,$id);
  }

  public function save(){
    $this->userDataMapper->save($this);
  }

  public function toArray(){
    return get_object_vars($this);
  }

  public function fromArray($arr){
    $this->name=$arr["name"];
    $this->lastname=$arr["lastname"];
    $this->email=$arr["email"];
    $this->bdate=$arr["bdate"];
    $this->transport=$arr["transport"];
  }

}

 ?>
