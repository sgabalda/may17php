<?php
/**
 * Create an email element
 * array element
 * html element
**/
function textareaElement($element, $data)
{
  if(empty($data))
  {
    $html='';
    $html.="<p>
    <label for=\"".$element['name']."\">".$element['label']."</label>
    <textarea  name=\"".$element['name']."\"
      >
      </textarea>";
  }
  else
  {
      $html='';
      $html.="<p>
      <label for=\"".$element['name']."\">".$element['label']."</label>
      <textarea  name=\"".$element['name']."\"
        >";
      $html.=$data[$element['name']];
      $html.="</textarea>";
  }
  return $html;
}
