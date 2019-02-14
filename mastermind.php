<?php

session_start();
if(!isset($_SESSION['number'])){
	$_SESSION['number'] = random_number();	
	$_SESSION['tries']= [];
}
if(!isset($_SESSION['treis'])){
	$_SESSION['tries'] = [];
}
if(isset($_POST['userNumber'])){
	$userNumber = (int)$_POST['userNumber'];
		if(is_valid_number(c)){
			$noofCorrectDigits = count_correct_digits($userNumber);	
			$noOfDigitsInPosition = count_digits_in_position($userNumber);
			$_SESSION['tries'] [] =
				"$usernumber: corect  - $noOfCorrectDigits". 
				"in Place - $noOfDigitsInPosition <br>";
			echo implode($_SESSION['tries']);
			if($userNumber == $_SESSION['number']){
				echo 'ai castigat';
			}
		}	
}

function count_correct_digits(int $userNumber){
//	transformam numarul emis de sesiune si cel de utilizator intr-un array -cu str_split si apoi array intersect - gaseste valorile comune intre cele 2 arrayuri si creaza un nou array cu val comune. 
	$sessionNumber = $_SESSION['number'];
	$comonDigits = array_intersect(
		str_split($sessionNumber),
		str_split($userNumber)
	);
	return count($comonDigits);
}
?>
<form method="post" action="mastermind.php"> 
	<label>ghiceste Numarul:</label>
	<input type="text" name="userNumber"/>
	<button type="submit">Send</button>

</form>


<?php

function random_number() {
//	generam un numar aleator. verificam daca are digits egale si le eliminam
	do {
		$number = rand(102,987);
	}
		while (has_repeted_digies($number));
		return $number;	
}
//	verificam daca are cifre identice transformand numarul in array cu str_split, apoi aplicam array_unique 
//	care elimina dublurile si comparam arrayul initial cu arrayul split.
function has_repeted_digies(int $number) {
	$digits = str_split($number);
	$uniqueDigits = array_unique($digits);
	if(count($uniqueDigits) === count($digits)){
		return false;
	} else { return true;
		   }
	
	
}

function count_digits_in_position(int $userNumber){
	$sessionNumber = $_SESSION['number'];
	$count = 0;
	for ($i=0; $i<3; $i++){
		if (substr($userNumber, $i, 1 == substr($sessionNumber, $i, 1))){
			$count++;
		}
	}
	return $count;
	
};
	
	function is_valid_number(int $userNumber) {
		return strlen($usernumber) == 3 &&
				!has_repeted_digits($userNumber);
		
		}
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	