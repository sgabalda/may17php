<?php

/**
 * Generate a html form
 * json form
 * string html
 **/

function formGenerator($form)
{
  $html='';
  echo $form;

  $jsonForm = file_get_contents($form);
  $jsonArray = json_decode($jsonForm, true);


  echo "<pre>";
  print_r($jsonArray);
  echo "</pre>";


  // Abrir el formulario
    // Para cada elemento del formulario
      // Si es Text
        // Contruir el campo de tipo texto
      // Si es hidden
        // construir el campo

      // Si es textarea
        // construir el campo
      // Si es checkbox
        // construir el campo
      // Si es select
      // Si es selectmultiple
      // Si es mail
      // Si es date
      // Si es password
      // Si es file
      // Si es radio


  // Cerrar formulario







  return $html;
}
