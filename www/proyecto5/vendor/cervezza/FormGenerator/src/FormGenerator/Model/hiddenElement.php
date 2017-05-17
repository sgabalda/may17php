<?php

/**
 * Create a hidden element
 * array element
 * html element
**/
function hiddenElement($element, $data)
{
  if(empty($data))
  {
    $html='';
    $html.="<input  type=\"".$element['type'].
      "\" name=\"".$element['name']."\" value=\"".$element['default']."\" >
    ";
  }
  else
  {
    $html='';
    $html.="<input  type=\"".$element['type'].
      "\" name=\"".$element['name']."\" value=\"".$data[$element['name']]."\" >
    ";
  }
  return $html;
}
