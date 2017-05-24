<?php


function Twosteps($layout, $content)
{
  ob_start();
    include $layout;
    $var = ob_get_contents();
  ob_end_clean();

  return $var;
}
