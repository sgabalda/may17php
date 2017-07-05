<?php

/**
 * Create a text element
 * array element
 * html element
**/

function textElement($element, $data,$errors=array())
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
              value=\"".htmlspecialchars($data[$element['name']])."\"
      >";
      if(isset($errors[$element['name']])){
        $html.="<span class='error'>".$errors[$element['name']]."</span>";
      }
      $html.="</p>";
  }
  return $html;
}
