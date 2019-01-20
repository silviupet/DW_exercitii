<?php

class BowlingGame 
{   
	private $rolls = [];
//un array care sa tina evidenta aruncariolr. arrayul va fi populat cu 23 de valori cu 0. Pentru acest lucru se foloseste un constructor in care se pune functia array _fill (0 - pozitiainitiala, 23 - pozitia pana la care se populeaza si 0 valoarea cu care se populeaza.)
	private $roll = 0;
	// aruncarea curenta
		
	public function __construct(){
		$this->rolls = array_fill(0,23,0);
	}
	
	public function score(){
		 $score = 0;
		 $i = 0;
		 $rolls = $this->rolls; 
		// pentru a prescurta si a nu scrie in funtia de mai jos $this->rolls si doar $rolls - este e variabila temporara. 
		while($i<21){
//		 facem o bucla in care se incrementeaza i (nr de aruncari pana la 21 aruncari - altfel incrementarile din functiile de mai jos s-ar opri. )
			if($this->isSpare($i)){
				$score += 10 + $rolls[$i+2];
				$i +=2; 
	//			se incrementeaza i su 2 la spare si normal si cu 1 la strike

			}elseif ($this->isStrike($i)) {
				$score += 10 + $rolls[$i+1] + $rolls[$i+2];
				$i ++;
			} else {
				$score += $rolls[$i] + $rolls[$i+1];
				$i +=2;
			}

			return $score;

		}
	}
	
	
	public function isStrike($i){
		return $this->rolls($i)  == 10;
	}
	
	public function isSpare($i){
		return $this->rolls($i) + $this->rolls($i+1) == 10;
	}
	
	
	
	public function roll($pins){
//		roll- nr de aruncari $pins - popice dobaorat la o aruncare
		$this->rolls[$this->roll] = $pins;
		$this->roll++;
		//se insereaza in arrayul rolls de numarul aruncarii - cu valoarea numarului de popice daramate. 
		
		
	}
	
	
	
	
}

?>



