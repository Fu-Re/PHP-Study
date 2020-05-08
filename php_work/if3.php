<?php
 if($argv[1] < 37.0){
     echo "平熱です。";
     echo "\n";
 }
 else if($argv[1] >= 37.0 && $argv[1] < 37.5){
     echo "微熱です";
     echo "\n";
 }
 else{
     echo "コロナの可能性あり";
     echo "\n";
 }
?>