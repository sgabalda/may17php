<?php
namespace Cervezza\DataManagement\Model;

class DataManagementDB
{
  static private function getConnection($config){

    return new \mysqli(
        $config["database"]["host"],
        $config["database"]["username"],
        $config["database"]["password"],
        $config["database"]["db"]
    );

  }

  static public function DeleteData($config, $id)
  {
    $dbPDO=DatabasePdoConnection::getInstance($config);
    $connection=$dbPDO->getConnection();

    //tengo en $conection la PDO connection par ejeecutar queries SQL
      $stmt=$connection->prepare("DELETE FROM USERS WHERE user_id=:id");
      $stmt->bindParam(":id",$id);
      $stmt->execute();
    return $id;
  }
  static public function GetData($config, $id)
  {
    $mysqli=self::getConnection($config);
    $stmt=$mysqli->prepare("SELECT user_id, name, lastname, email, bdate ".
      "from users".
      " WHERE user_id=?"
    );
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $user=[];
    if($fila=$result->fetch_row()){
      $user=array(
        "id"=>$fila[0],
        "name"=>$fila[1],
        "lastname"=>$fila[2],
        "email"=>$fila[3],
        "bdate"=>$fila[4]
      );
    }

    $stmt=DatabasePdoConnection::getInstance($config)->getConnection()->prepare(
      "SELECT NAME FROM TRANSPORT INNER JOIN USERS_TRANSPORT ".
      "ON USERS_TRANSPORT.user_id=:id ".
      "AND USERS_TRANSPORT.transport_id=TRANSPORT.transport_id"
    );
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $transports=$stmt->fetchAll(\PDO::FETCH_COLUMN);
    $user["transport"]=$transports;

    return $user;
  }


  static public function GetDatas($config)
  {
    $mysqli=self::getConnection($config);

    $stmt=$mysqli->prepare("SELECT user_id, name, lastname, email, bdate from users");
    $stmt->execute();
    $stmt->bind_result($id, $name,$lastname,$email,$bdate);

    $user=[];

    while($stmt->fetch()){
      $user[$id]=array(
        "name"=>$name,
        "lastname"=>$lastname,
        "email"=>$email,
        "bdate"=>$bdate
      );
    }
    $stmt->close();

    return $user;
  }
  static public function SetData($usersFilename, $data)
  {

    return $data;
  }
  static public function UpdateData($usersFilename, $data, $id)
  {


    return $data;
  }
}
