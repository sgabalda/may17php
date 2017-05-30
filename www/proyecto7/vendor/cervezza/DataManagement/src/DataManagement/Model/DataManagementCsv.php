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
  static public function GetDatas($usersFilename)
  {
    $datas = file_get_contents($usersFilename);
    $datas = explode("\n", $datas);
    foreach($datas as $key => $data)
        $datas[$key]=explode(',', $data);

    return $datas;
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
