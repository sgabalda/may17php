<?php
/**
 * Generate a multipleSelect element
 * array form
 * string html
 **/
function multipleSelectElement($element, $data)
{
  if(empty($data))
  {
      $html =  "<label for =\"".$element["name"]."\" >".$element["label"]."</label>";
      $html .= "<p>";
      $html .=  "<select multiple name=\"".$element["name"]."[]\">";
      foreach ($element["options"] as $key => $value) {
        $html .= "<option value=\"".$value."\">".$key."</option>";
      }
      $html .= "</p>";
      $html .= "</select>";
  }
  else
  {
    $data = explode("|", $data[$element['name']]);
    $html =  "<label for =\"".$element["name"]."\" >".$element["label"]."</label>";
    $html .= "<p>";
    $html .=  "<select multiple name=\"".$element["name"]."[]\">";
    foreach ($element["options"] as $key => $value) {
      $html .= "<option value=\"".$value."\" ";
        if(in_array($value, $data))
          $html.= "selected";
      $html.=">".$key."</option>";
    }
    $html .= "</p>";
    $html .= "</select>";
  }
  return $html;
}
