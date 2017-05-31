<?php
namespace Cervezza\DataManagement\Model;

class DataManagementCsv
{
  static public function DeleteData($usersFilename, $id)
  {
    $users = file_get_contents($usersFilename);
    $users = explode("\n", $users);
    unset($users[$id]);
    $users = implode("\n", $users);
    file_put_contents($usersFilename, $users);

    return $id;
  }
  static public function GetData($usersFilename, $id)
  {
    $users = file_get_contents($usersFilename);
    $users = explode("\n", $users);
    $user = $users[$id];
    $user = explode(",",$user);

    return $user;
  }

  static function createJson($datas)
  {
    $columnNames = explode(",",$datas[0]);
    foreach($datas as $key => $data)
    {
      $usert[$key]=explode(',', $data);
        foreach($columnNames as $key2 => $data2)
          $user[$key][$data2]=@$usert[$key][$key2];
    }
    return $user;
  }

  static public function GetDatas($usersFilename)
  {
    $datas = file_get_contents($usersFilename);
    $datas = explode("\n", $datas);
    $user = self::createJson($datas);
    return $user;
  }
  static public function SetData($usersFilename, $data)
  {
    $line = array();
    foreach($data as $value)
    {
          if(!is_array($value))
              $line[]= $value;
          else
              $line[]= implode('|',$value);
    }
    $line = implode(',', $line)."\n";
    file_put_contents($usersFilename, $line, FILE_APPEND);

    return $data;
  }
  static public function UpdateData($usersFilename, $data, $id)
  {
    $users = file_get_contents($usersFilename);
    $users = explode ("\n", $users);
    $user=array();
    foreach ($data as $key => $value)
    {
      if(is_array($value))
        $user[]=implode("|", $value);
      else
        $user[]=$value;
    }
    $user = implode(",", $user);
    $users[$id]=$user;
    $users = implode("\n",$users);
    file_put_contents($usersFilename, $users);

    return $data;
  }
}
