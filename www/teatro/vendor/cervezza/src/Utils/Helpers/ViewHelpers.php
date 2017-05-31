<?php
namespace Cervezza\Utils\Helpers;

class ViewHelpers
{
  static public function RenderView($router, $data)
  {

    $action = substr($router['action'],0,-6);
    ob_start();
      include_once("../modules/".$router['module']."/src/views/".
                                 $router['controller']."/".
                                 $action.".phtml");
      $content = ob_get_contents();
    ob_end_clean();
    return $content;
  }

  static public function DibujaTabla($array, $links=array())
  {


    // echo "<pre>";
    // print_r($array);
    // echo "</pre>";


    // Determinar el inicio y fin de filas
    $filasmax = sizeof($array);

    // Determinar el inicio y fin de columnas
    $columnasmax = sizeof($array[0]);

    // Crear tabla
    $html ="<table class=\"table table-striped\">";
        foreach ($array as $key => $value)
        {
          $html.="<tr>";
          foreach ($value as $key2 => $value2)
          {
            $html.="<td>";
                $html.=$value2;
            $html.="</td>";
          }


          if(sizeof($links)!=0)
          {
            $html.="<td>";
                // Para cada columna poner el valor
                $html.="<a href=\"".$links[0].$key."\">Update</a> |";
                $html.="<a href=\"".$links[1].$key."\">Delete</a>";
            $html.="</td>";
          }
          else {
            $html.="<td>";
                // Para cada columna poner el valor
                $html.="<a href=\"/users/users/update/iduser/".$key."\">Update</a> |";
                $html.="<a href=\"/users/users/delete/iduser/".$key."\">Delete</a>";
            $html.="</td>";
          }




          $html.="</tr>";
        }
    $html.="</table>";
    // Retornar la tabla
    return $html;
  }
}
