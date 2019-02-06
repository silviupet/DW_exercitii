<?php
session_start();
if(!isset($_SESSION['word'])){
	$word = str_split(randomWord());
//	str_split ca si explode transforma un string intr-un array.  
	$chances = 15;
	$guessed = array_fill(0 , count($word)  , '-');
	//pick a random word
//se vor face 2 arrayuri unul cii cuvantul ex hangman->['h','a'...] si unul cu ce s-a ghicit pana acum  - ['-', '-'...]

	$_SESSION['word'] = $word;
	$_SESSION['chances'] = $chances;
	$_SESSION['guessed'] = $guessed;
}
if(isset($_POST['letter'])){
	$letter = $_POST['letter'];
	if(hasLetter($letter)){
	
	searchAndReplaceLetter($letter);
				
			
		
		checkWin();
		
	} else {
		$_SESSION['chances']--;
		checkLost();
	
	
}
}

function hasLetter($letter){
	return array_search($letter, $_SESSION['word']) !== false;
}
function searchAndReplaceLetter($letter){
	foreach($_SESSION['word'] as $key => $value){
			if($value == $letter){
				$_SESSION['guessed'][$key] = $letter;
	
}
}
}

function checkWin(){
	if(array_search('-' , $_SESSION['guessed']) === false){
			session_destroy();
			?> <script>alert("you won")</script> <?php
	}
}
	function checkLost(){
		if($_SESSION['chances'] == 0){
			session_destroy();
			?> <script>alert("game over")</script> <?php
		
	}
	}
function randomWord() {
	$words = file('words.txt');
	return trim($words[array_rand($words)]);
//	[array_rand($words)] da o pozitie aleatoare si apoi arrayul $words[pozitie aleatoare] = da valoarea 
}
?>
<div>
Mai ai <?php echo $_SESSION['chances']; ?> incercari.
</div>
<div>
<?php echo implode(" " , $_SESSION['guessed']); ?>	
<!--implode este o functire care transforma   array-ul intr un string iar intercalat intre elementele arrasyului sa fie un spatiu liber (glue)-->
	
</div>
<form action="hangman.php" method="post">
	<label>Ghiceste Litera</label>
	<input type="text" name="letter"/>
	<button type="submit">Trimite</button>
	  </form>


