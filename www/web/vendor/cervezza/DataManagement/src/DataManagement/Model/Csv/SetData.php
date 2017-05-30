<?php

/**
 * Set data in repository
 * return array data
 */

function SetData($usersFilename, $data)
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
