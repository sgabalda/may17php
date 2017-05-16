<?php


if(isset($_GET['action']))
  $action = $_GET['action'];
else
  $action = 'select';

switch ($action)
{
  case 'select':
    echo "esto es select";
  break;
  case 'insert':
    echo "esto es insert";
  break;
  case 'update':
    echo "esto es update";
  break;
  case 'delete':
    echo "esto es delete";
  break;
  default:
    echo "esto es todos los demas";
  break;
}
