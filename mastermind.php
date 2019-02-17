<?php

session_start();
if(!isset($_SESSION['number'])){
	$_SESSION['number'] = random_number();	
}

if(isset($_POST['userNumber'])){
	$userNumber = $_POST['userNumber'];
		if(is_valid_number($userNumber)){
			$noofCorrectDigits = count_correct_digits($userNumber);	
			$noOfDigitsInPosition = count_digits_in_position($userNumber);
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
//	care elimina dublurile si comparam arrayul initial cu arrayul unique.
function has_repeted_digies(int $number) {
	$digits = str_split($number);
	$uniqueDigits = array_unique($digits);
	if(count($uniqueDigits) === count($digits)){
		return false;
	} else { return true;
		   }
	
	
}