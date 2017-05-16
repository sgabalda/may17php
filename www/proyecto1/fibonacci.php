F=0,1,1,2,3,5,8,13,21,34
<hr/>
<?php
$max = 40;
echo "F=";
$n=0;
$n1=1;
echo $n;
echo ",";
echo $n1;
echo ",";
$n2 = ($n+$n1);
while ($max>=($n2))
{
  echo $n2;
  echo ",";

  $n = $n1;
  $n1 = $n2;
  $n2 = $n+$n1;
}
