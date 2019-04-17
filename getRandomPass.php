<?php

function getRandomPass(int $n) {
        $pass ="";
    for ($i=1; $i<=$n; $i++){
        $chars = "asdfghjklqwertyuiopZXCVBNMASDFGHJKL1234567890!@#$%^&*()";
        $pozitie = RAND(0,strlen($chars));
       
        $caracter = substr($chars, $pozitie, 1);
        $pass = "$pass" . "$caracter";
        
       
    }  
        echo $pass;
  
    
}

getRandomPass(5);
