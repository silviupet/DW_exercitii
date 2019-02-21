<?php
//var_dump($_SERVER)
if (isset($_POST['uri'])){
	$short = generate_short();
	echo "$short";
	
	die();
}
if(isset($_GET['url'])) {
	$correlate = (array)json_decode(file_get_contents('short.txt'));
	var_export($correlate);
	$originalurl = $correlate[(string)$_GET['url']];
	header('Location: '. $originalurl);
	die();
}

?>

<form action = "short.php" method="post" >
	<label for="uri">URI</label>
	<input type="txt", name="uri"/>
	<button type = "submit"> Generate</button>
</form>

<?php
function generate_short(){
	$correlate = (array)json_decode(file_get_contents('short.txt'));
	$number = rand(10000, 99999);
	$short =  "http://". $_SERVER['SERVER_NAME']
		. $_SERVER['REQUEST_URI']. '?url='.$number;
	$correlate[$number] = $_POST['uri'];
	$serialized = json_encode($correlate);
		file_put_contents('short.txt' , $serialized);
	return $short;
}