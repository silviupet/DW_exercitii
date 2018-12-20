	<?php
	echo file_get_contents("html/header.html");
	
	$colors = [
	'w3-highway-brown' => '#633517',
	'w3-highway-red' =>	"#a6001a",
	'w3-highway-orange' =>	'#e06000',
	"w3-highway-schoolbus" => "#ee9600",
    "w3-highway-yellow"	=> "#ffab00",
    "w3-highway-green" =>	"#004d33",
    "w3-highway-blue" =>	"#00477e",
	
	
	];
	
	 foreach ($colors as $name => $code){
		 echo "
			 <div style='background-color: $code; color: white;'>$name</div>
			 ";
		 
		 
		 
	 }
	echo file_get_contents("html/footer.html")
	
	?>