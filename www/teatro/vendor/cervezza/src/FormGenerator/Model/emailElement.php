<?php

/**
 * Create an email element
 * array element
 * html element
**/

function emailElement($element, $data)
{
  if(empty($data))
  {
    $html='';
    $html.="<p>
      <label for=\"".$element['name']."\">".$element['label']."</label>
      <input  type=\"".$element['type']."\"
              name=\"".$element['name']."\"
      >
      </p>";
  }
  else
  {
    $html='';
    $html.="<p>
      <label for=\"".$element['name']."\">".$element['label']."</label>
      <input  type=\"".$element['type']."\"
              name=\"".$element['name']."\"
              value=\"".$data[$element['name']]."\"
      >
      </p>";
  }
  return $html;
}
