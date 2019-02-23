<?php
//var_dump($_SERVER);
if (isset($_POST['uri'])){
	$short = generate_short();
	echo "$short";
	
	die();
}
if(isset($_GET['url'])) {
	$correlate = (array) json_decode(file_get_contents('short.txt'));
	var_dump($correlate);
	$originalUrl = $correlate[(string)$_GET['url']];
	header('Location: '. $originalUrl);
//	face redirectionarea 
	die();
}

?>

<form action = "short.php" method="post" >
	<label for="uri">URI</label>
	<input type="text", name="uri"/>
	<button type = "submit"> Generate</button>
</form>

<?php
function generate_short(){
	
	$correlate = (array)json_decode(file_get_contents('short.txt'));
//	deserializare luam din fisierul test, sirul de caractere si il transformam din nou in array. apoi se genereaza un nou numar pt un Post de uri , se serializeaza se pune in fisierul txt. Prin deserializare il transforma intr-un obiect avand proprietati cheile. ca sa-l faca array - trebuie castat la array - se pune (array) in fata. 
	$number = rand(10000, 99999);
	$short =  "http://". $_SERVER['SERVER_NAME']
		. $_SERVER['REQUEST_URI']. '?url='.$number;
	$correlate[$number] = $_POST['uri'];
//	un array care coreleaza uri din post (formular) cu numarul generat aleator prin rand - numarul e cheie iar val este uri. 
	$serialized = json_encode($correlate);
		file_put_contents('short.txt', $serialized );
//	file_put_contents nu poate pune in fisierul txt un array continund numar aleator si POST[uri]. ca atare se face serializare/deserializare cu json encode. Serializare/deserializare - ia o variabila si o trans intr-un sir de caractere iar apoi il transformam din nou in variabila/
	return $short;
}