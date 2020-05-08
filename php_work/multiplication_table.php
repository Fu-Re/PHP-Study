<?php

for($x = 1; $x <= 9; $x++){
 for($y = 1; $y <= 9; $y++){
  
  $num = $x * $y;
  echo $num;
  
  if($y < 9) echo " ";
  else if($y === 9) echo "\n";
  
 }
}

?>