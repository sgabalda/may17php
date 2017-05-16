<?php

/**
 * Create a submit element
 * array element
 * html element
**/
function submitElement($element)
{
  $html='';
  $html.="<input type=\"submit\"
                 name=\"".$element['name']."\"
                 value=\"".$element['label']."\"
          >";
  return $html;
}
