<?php

/**
 * Create a select element
 * array element
 * html element
**/

function selectElement($element, $data)
{
  if(empty($data))
  {
    $html='';
    $html.="<p>";
        $html.="<label for=\"".$element['name']."\">".$element['label']."</label>";
  			$html.="<select name=\"".$element['name']."\">";
        foreach($element['options'] as $key=> $value){
  				$html.="<option value=\"".$value."\">".$key."</option>";
        }
  			$html.="</select>";
  			$html.="</p>";
  }
  else
  {
    $html='';
    $html.="<p>";
        $html.="<label for=\"".$element['name']."\">".$element['label']."</label>";
  			$html.="<select name=\"".$element['name']."\">";
        foreach($element['options'] as $key=> $value){
  				$html.="<option value=\"".$value."\" ";
              if($value==$data[$element['name']])
                $html.="selected";

          $html.=">".$key."</option>";
        }
  			$html.="</select>";
  			$html.="</p>";
  }
  return $html;
}


 ?>
