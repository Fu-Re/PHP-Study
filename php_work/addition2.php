<?php
function add($x, $y){
 $sum = $x + $y;
 echo "加算の結果：".$sum;
 echo "\n";
}

add($argv[1], $argv[2]);
?>