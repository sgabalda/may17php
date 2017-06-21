<?php

namespace Users\Model\DataMapping;

use Cervezza\DataManagement\Model\DatabasePdoConnection;

class UserDataMapper{

  private $connection;

  public function __construct(){
    $config=array(
      "database"=>array(
        "host"=>"localhost",
        "db"=>"teatro",
        "username"=>"teatrouser",
        "password"=>"teatropass"
      )
    );
    $this->connection=DatabasePdoConnection::getInstance($config)->getConnection();
  }

  public function load($user,$id){
    $stmt=$this->connection->prepare("SELECT user_id, name, lastname, email, bdate ".
      "from users".
      " WHERE user_id=:id"
    );
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $values=$stmt->fetchAll();
    $user->id=$values[0]['user_id'];
    $user->name=$values[0]['name'];
    $user->lastname=$values[0]['lastname'];
    $user->email=$values[0]['email'];
    $user->bdate=$values[0]['bdate'];

    //TODO cargar los trasnportes

  }

  public function save($user){
    $this->connection->beginTransaction();
    try{
      //hacer las queries que haga falta
      if($user->id){
        $stmt=$this->connection->prepare("UPDATE USERS ".
        " SET ".
        "name=:name, lastname=:lastname, email=:email, bdate=:bdate WHERE user_id=:id");
        $stmt->bindParam(":id",$user->id);
      }else{
        $stmt=$this->connection->prepare("INSERT INTO USERS ".
        "(name,lastname,email,bdate) values ".
        "(:name, :lastname, :email, :bdate)");
      }


      $stmt->bindParam(":name",$user->name);
      $stmt->bindParam(":lastname",$user->lastname);
      $stmt->bindParam(":email",$user->email);
      $stmt->bindParam(":bdate",$user->bdate);
      $stmt->execute();

      //si es un update, usa el id para actualizar los transportes
      if($user->id){
        $id=$user->id;
      }else{
        //si no es update
        //guarda el id del usuario, que se genero con el auto increment
        $id=$this->connection->lastInsertId();
        $user->id=$id;
      }
      $transports=self::getTransports();
      if($user->transport){
        foreach ($user->transport as $value) {
          $stmt=$this->connection->prepare("INSERT INTO USERS_TRANSPORT ".
          "(user_id,transport_id) values (:id,:transport_id)");
          $stmt->bindParam(":id",$id);
          $stmt->bindParam(":transport_id",array_search($value,$transports));
          $stmt->execute();
        }
      }

      //aplicarlas a la base de datos
      $this->connection->commit();

    }catch(\Exception $e){
      $this->connection->rollBack();
      throw $e;
    }
  }

  private function getTransports(){
    $sql="SELECT transport_id, name FROM TRANSPORT";
    $query=$this->connection->query($sql);
    foreach ( $query as $row) {
      $result[$row['transport_id']]=$row['name'];
    }
    return $result;
  }

}

 ?>
