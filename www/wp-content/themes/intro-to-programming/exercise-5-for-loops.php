<?php

for($i=0; $i<101; $i++){

  if (0!=$i % 2){
    echo "<br/>$i";

  }
}

echo "<br/>";

echo"<h1>Multiplication Table</h1>";
echo"<table>";

for($i=1; $i<=15;$i++){
  echo"<tr>";



  for($j=1; $j<=12; $j++){
    echo "<td>".$i*$j."</td>";
  }

  echo"</tr>";
}
echo"</table>";

echo "<br/>";

$sum=0;
$x=1;
$y=5;
for($i=$x; $i<=$y; $i++){
  $sum=$sum+$i;
}
echo $sum;

?>
