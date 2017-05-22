<?php

/**
 * Delete data by id from repository
 * return id
 */

function DeleteData($usersFilename, $id)
{
  $users = file_get_contents($usersFilename);
  $users = explode("\n", $users);
  unset($users[$id]);
  $users = implode("\n", $users);
  file_put_contents($usersFilename, $users);

  return $id;
}
