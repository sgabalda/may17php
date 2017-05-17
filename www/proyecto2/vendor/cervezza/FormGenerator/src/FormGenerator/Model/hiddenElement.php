<?php

/**
 * Create a hidden element
 * array element
 * html element
**/
function hiddenElement($element)
{
  $html='';
  $html.="<input  type=\"".$element['type'].
    "\" name=\"".$element['name']."\" value=\"".$element['default']."\" >
  ";
  return $html;
}
