<?php

/**
 * Create a checkbox element
 * array element
 * html element
**/

function checkboxElement($element)
{
  $options = sizeof($element['options']);
  $html='';
  $html.="<p>
  <label for=\"".$element['name']."\">".$element['label']."</label>";

      foreach($element['options'] as $option => $value)
       {
        $html.="</br><input type=\"".$element['type']."\" name=\"".$element['name']."[]\" value=\"".$value."\" >$option";

       }

    $html.="</p>";
  return $html;
}
