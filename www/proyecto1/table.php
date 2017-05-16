<table border=1>
  <tr>
    <td>0</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
  </tr>
  <tr>
    <td>0</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
  </tr>
  <tr>
    <td>2</td>
    <td>4</td>
    <td>6</td>
    <td>8</td>
    <td>10</td>
  </tr>
  <tr>
    <td>3</td>
    <td>6</td>
    <td>9</td>
    <td>12</td>
    <td>15</td>
  </tr>
</table>
<?php
$filas = 7;
$columnas = 4;

echo "<table border=1>";
for($i=0;$i<=$filas;$i++)
{
  echo "<tr>";
  for ($z=0;$z<=$columnas;$z++)
  {
    if($i==0)
    {
      echo "<td>";
      echo $z;
      echo "</td>";
    }
    else if ($z==0)
    {
      echo "<td>";
      echo $i;
      echo "</td>";
    }
    else{
      echo "<td>";
      echo $i*$z;
      echo "</td>";
    }
  }

  echo "</tr>";
}

echo "<table/>";


?>
