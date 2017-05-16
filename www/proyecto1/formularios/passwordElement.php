<?php
/**
 * Create an password element
 * array element
 * html element
**/
function passwordElement($element)
{
  $html ="";
  $html.="<p>
    <label for=\"".$element['name']."\">".$element['label']."</label>
    <input  type=\"".$element['type']."\"
            name=\"".$element['name']."\"
    >
    </p>";
  return $html;
}
