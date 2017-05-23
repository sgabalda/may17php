<?php

/**
 * Read data by id from repository
 * return array data
 */

function GetData($usersFilename, $id)
{
  $users = file_get_contents($usersFilename);
  $users = explode("\n", $users);
  $user = $users[$id];
  $user = explode(",",$user);

  return $user;
}
