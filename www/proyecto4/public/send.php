<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";


// Guardar en un archivo separado por comas

$line = array();
// para cada elemento del array POST
foreach($_POST as $value)
{
      // Si el elemento no es de tipo array
      if(!is_array($value))
      {
          // Separ por comas
          $line[]= $value;
      }
      // Si el elemento es de tipo ArrayAccess
      else
      {
          // Separa por comas
          $line[]= implode('|',$value);
      }
}

// Concatenar con el elemento anterior
$line = implode(',', $line)."\n";
// Ver por pantalla la linea
echo "<pre>";
print_r($line);
echo "</pre>";



file_put_contents('user.txt', $line, FILE_APPEND);
