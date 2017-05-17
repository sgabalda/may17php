<?php

/**
 * Create a select element
 * array element
 * html element
**/

function selectElement($element)
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

  return $html;
}


 ?>
