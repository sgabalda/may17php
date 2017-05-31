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
    {
        $usert[$key]=explode(',', $data);

        $user[$key]['name']=@$usert[$key][0];
        $user[$key]['lastname']=@$usert[$key][1];
        $user[$key]['email']=@$usert[$key][2];
        $user[$key]['bdate']=@$usert[$key][3];
        $user[$key]['gender']=@$usert[$key][4];
        $user[$key]['transport']=@$usert[$key][5];
        $user[$key]['city']=@$usert[$key][6];
        $user[$key]['hobbies']=@$usert[$key][7];
        $user[$key]['password']=@$usert[$key][8];
        // $user['iduser']=$user[9];
        // $user[$key]['iduser']=$this->router['params']['iduser'];
        $user[$key]['description']=@$usert[$key][10];
        $user[$key]['photo']=@$usert[$key][11];
        $user[$key]['enviar']=@$usert[$key][12];

    }

    // echo "<pre>";
    // print_r($user);
    // echo "</pre>";
    // die;
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
