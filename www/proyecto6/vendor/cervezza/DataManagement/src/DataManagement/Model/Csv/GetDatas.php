<?php

/**
 * Read data from repository
 * return array datas
 */

function GetDatas($usersFilename)
{
  $datas = file_get_contents($usersFilename);
  $datas = explode("\n", $datas);
  foreach($datas as $key => $data)
      $datas[$key]=explode(',', $data);

  return $datas;
}
