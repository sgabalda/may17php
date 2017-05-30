<?php

/**
 * Set data by id in repository
 * return array data
 */

function UpdateData($usersFilename, $data, $id)
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
