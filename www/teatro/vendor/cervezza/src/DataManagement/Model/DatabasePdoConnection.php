<?php

namespace Cervezza\DataManagement\Model;

class DatabasePdoConnection{
  //SINGLETON implementation behaviour
  //campo estático donde guardar la instancia
  private static $instance=FALSE;
  //metodo para obtener la instnacia desde fuera
  public static function getInstance($config){
    if(!self::$instance){
      self::$instance=new DatabasePdoConnection($config);
    }
    return self::$instance;
  }
  //evitar que se pueda crear una instancia desde fuera:constructor privado
  private function __construct($config){
    try{
      $this->connection=new \PDO("mysql:dbname=".$config["database"]["db"].
        ";host=".$config["database"]["host"],
        $config["database"]["username"],
        $config["database"]["password"]);
      }catch(\Exception $e){
        throw new \Exception($e->getMessage());
      }
      $this->connection->setAttribute(\PDO::ATTR_ERRMODE,
        \PDO::ERRMODE_EXCEPTION);
  }
  public function __clone(){
    throw new \Exception();
  }

  private $connection;    //PDO connection

  public function getConnection(){
    return $this->connection;
  }


}
