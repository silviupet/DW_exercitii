<?php

ini_set('display_startup_errors', true);
ini_set('display_errors', true);

error_reporting(E_WARNING | E_NOTICE);

set_error_handler('handleError');
function handleError($level, $message, $file, $line){
	
	file_put_contents('error.txt', 
					  "$level $message in $file at $line\n",
					 FILE_APPEND
					 );
}
//afiseaxa doar acele tipuri de erori

$a = 1;

//	parse error - eroare de compilare - nu merge mai departe
$b = $a/0;
//warning - nu f grave gravitate 2
$c = [];
echo $c[1];
//Notice gravitate 3
//ca sa nu se mai afiseze erorile se pot capta intr-un eroor heandler 
trigger_error('e grav');
	
	
	
