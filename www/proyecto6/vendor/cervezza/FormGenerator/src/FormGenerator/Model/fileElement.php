<?php
/**
 * Create an email element
 * array element
 * html element
**/
function fileElement($element, $data)
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
    $html.="<p>";
    $html.='<strong>Actual file: '.$data[$element['name']]."</strong> ";
    $html.="<label for=\"".$element['name']."\">".$element['label']."</label>
      <input  type=\"".$element['type']."\"
              name=\"".$element['name']."\"
      >
      </p>";
  }
  return $html;
}
