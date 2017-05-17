<?php
/**
 * Create an email element
 * array element
 * html element
**/
function textareaElement($element)
{
  $html='';
  $html.="<p>
  <label for=\"".$element['name']."\">".$element['label']."</label>
  <textarea  name=\"".$element['name']."\"
    >
    </textarea>";
  return $html;
}
