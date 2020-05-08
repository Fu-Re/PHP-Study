<?php

function hello_user($username){
echo "こんにちは、".$username."さん\n";
}

hello_user($argv[1]);

?>