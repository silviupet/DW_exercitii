<?php

echo file_get_contents("html/header.html");
$users = [];
$file = fopen("users.txt", "r");
while(!feof($file)){
	
	$line = trim(fgets($file));
	$exploded = explode ("/", $line, 2);
	$user = $exploded [0];
	$password = $exploded[1];
	$users[$user]= $password;
}
$uname = $_POST["uname"];
if(isset($users[$uname])){
	if($_POST["psw"] == $users[$uname]){
		
		echo "welcome $uname!";
		session_start();
		$SESSION["user"] = $uname;
		
	}else {
	echo "user and pass not match";
}
}	else {
		echo "invalid user";
}
echo file_get_contents("html/footer.html");