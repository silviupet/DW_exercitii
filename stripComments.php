<?php
//exercitiu cum se numara liniile dintr-un cod fara comentarii. trebuie eliminate liniile care incep cu // sau /* si care se termina cu \n sau*/
/* prima data citim codul intr-o variabila*/
$code = file_get_contents(__DIR__."/test.php");

while(($start = strpos($code, "/*")) !== false ){
	$end = strpos($code, "*/", $start + 2);
//	endul trebuie sa fie cautat dupa start la 2 caractere pt a se evita /*/
	$code = substr($code, 0 , $start) . substr($code , $end +2);
//	concatenem de la incep codului pana la start cu stringul de la end+2 to final . Sunstr - fce un substring dintr-un string
}

while(($start = strpos($code, "//")) !== false ){
$end = strpos($code, "\n", $start + 2);
//	endul trebuie sa fie cautat dupa start la 2 caractere pt a se evita /*/
	$code = substr($code, 0 , $start) . substr($code , $end);
}

echo  $code;


$a = explode("\n" , trim($code));

		foreach($a as $lines){
			if(($lines) !== ''){
			$b[]=$lines;
			}
	}

echo count($b);

