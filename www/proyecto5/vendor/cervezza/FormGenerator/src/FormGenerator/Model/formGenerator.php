<?php

/**
 * Generate a html form
 * json form
 * string html
 **/
require('textElement.php');
require('emailElement.php');
require('multipleSelectElement.php');
require('hiddenElement.php');
require('dateElement.php');
require('passwordElement.php');
require('textareaElement.php');
require('fileElement.php');
require('checkboxElement.php');
require('radioElement.php');
require('selectElement.php');
require('submitElement.php');

function formGenerator($form)
{
  $html='';
  
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

        // Si es Hidden
        case 'hidden':
          // Contruir el campo de tipo texto
          $html.=hiddenElement($element);
        break;

        // Si es Text
        case 'email':
          // Contruir el campo de tipo texto
          $html.=emailElement($element);
        break;

        // Si es selectmultiple
        case 'selectmultiple':
          // Contruir el campo
          $html.=multipleSelectElement($element);
        break;

      // Si es textarea
      case 'textarea':
        // Contruir el campo
        $html.=textareaElement($element);
      break;
      // Si es checkbox
      case 'checkbox':
        // Contruir el campo
        $html.=checkboxElement($element);
      break;
      // Si es select
      case 'select':
        // Contruir el campo
        $html.=selectElement($element);
      break;

      // Si es date
      case 'date':
        // Contruir el campo
        $html.=dateElement($element);
      break;
      // Si es password
      case 'password':
        // Contruir el campo
        $html.=passwordElement($element);
      break;
      // Si es file
      case 'file':
        // Contruir el campo
        $html.=fileElement($element);
      break;
      // Si es radio
      case 'radio':
        // Contruir el campo
        $html.=radioElement($element);
      break;
      // Si es submit
      case 'submit':
        // Contruir el campo
        $html.=submitElement($element);
      break;
      }
    }

  // Cerrar formulario
  $html.="</form>";






  return $html;
}
