<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>
<?php
date_default_timezone_set("Europe/Bucharest");
for($j=1 ; $j<10; $j++) {
	echo "<div>" ;
	for($i=1; $i<10; $i++)	{
	echo "$j x $i = " . $j * $i . "<br />";
	}
	echo "</div>";
}
	
$colors = ["red","green","blue"];
foreach($colors as $color) {
	echo "<div style=\"color: $color;\">$color</div>";
	
}
	
	?>
	
<body>
</body>
</html>