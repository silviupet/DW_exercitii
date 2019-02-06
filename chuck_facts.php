<?php
//transformarea fisierului text intr-un array
$lines = file('chuck_norris_facts.txt');
//o alta varde a elimina randurile goale este cu array filter care filtreaza un array folosind o functie care pastreaza doar valorile true ale functiei.  
//$line = array_filter ($lines , function($line){
//	return empty(trim($line)):
//})
//alege o linie randomly 
$position = rand(0, count($lines)-1);
//sau $position = array_rand($lines);
$line  = $lines[$position];
//if the line is empty pick next line
if(empty(trim($line))){
	$line = $lines[$position + 1];
}
//echo the line
echo $line ; '<br>';  
//var2

$lines = file('chuck_norris_facts.txt');
//o alta varde a elimina randurile goale este cu array filter care filtreaza un array folosind o functie care pastreaza doar valorile true ale functiei.  
$lines = array_filter ($lines , function($line){
return !empty(trim($line));
});
//alege o linie randomly 
$position = rand(0, count($lines)-1);
//sau $position = array_rand($lines);
$line  = $lines[$position];



//echo the line
echo $line; '<br>'; 

//var3
$lines = file('chuck_norris_facts.txt');
$lines = array_filter ($lines , function($line){
return !empty(trim($line));
});
//alege o linie randomly 

 $position = array_rand($lines);
$line  = $lines[$position];

//echo the line
 echo $line;