<?php

/**
 * Generate a html form
 * json form
 * string html
 **/
require('textElement.php');
require('emailElement.php');

function formGenerator($form)
{
  $html='';
  echo $form;

  $jsonForm = file_get_contents($form);
  $jsonArray = json_decode($jsonForm, true);


  // echo "<pre>";
  // print_r($jsonArray);
  // echo "</pre>";


  // Abrir el formulario
  $html="<form name=\"".$jsonArray['formName']."\" method=\"".$jsonArray['method']."\" action=\"".$jsonArray['action']."\">";
    // Para cada elemento del formulario
    foreach($jsonArray['elements'] as $element)
    {
      switch($element['type'])
      {
        // Si es Text
        case 'text':
          // Contruir el campo de tipo texto
          $html.=textElement($element);
        break;
        // Si es Text
        case 'email':
          // Contruir el campo de tipo texto
          $html.=emailElement($element);
        break;


      // Si es hidden
        // construir el campo

      // Si es textarea
        // construir el campo
      // Si es checkbox
        // construir el campo
      // Si es select
      // Si es selectmultiple

      // Si es date
      // Si es password
      // Si es file
      // Si es radio
      }
    }

  // Cerrar formulario
  $html.="</form>";






  return $html;
}
