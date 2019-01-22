<?php

//best practice - se foloseste require_once
require_once 'BowlingGame.php';
function testZeroGame(){
	$game = new BowlingGame();

	for($i=0; $i<20; $i++) {
		$game->roll(0);
	}
	if($game->score() !=0){
		echo "test gresit, scorul " . $game->score()." e diferitde 0\n";
//		s-a folosit \n ca o scurtatura la br
	} else{
		echo "ok\n";
	}
}
function testSpare(){
	$game = new BowlingGame();
	

	$game->roll(5);
	$game->roll(5);
//	avem spare asta inseamna bonus nr de popice doborate la urmat aruncare (in ex nostru de 3)
	$game->roll(3);
//	rezultatul celor 2 aruncari este 16 (5+5 prima aruncare , 3 bonusul si 3 a 2-a arucare)
	
	if($game->score() !=16){
		echo "test gresit, scorul " . $game->score()." e diferitde 16\n";
	} else{
		echo "ok\n";
	}
}
function testStrike(){
	$game = new BowlingGame();
	
	$game->roll(10);
	$game->roll(5);
//	avem strike inseamna bonus nr de popice doborate la urmat 2 aruncari (in ex nostru de 5 si 3)
	$game->roll(3);
//	rezultatul celor 2 aruncari este 26 (10 prima aruncare , 8 bonusul si 8 a 2-a arucare)
	
	if($game->score() !=26){
		echo "test gresit, scorul " . $game->score()." e diferitde 26\n";
	} else{
		echo "ok";
	}
}
testZeroGame();
testSpare();
testStrike();

?>