<?php
function Connection(){
	$servername = "localhost";
	$username = "myuser";
	$password = "inti2018";
	$dbname = "arduino";
	
	$dblink = mysqli_connect($servername, $username, $password, $dbname);
	if(!$dblink) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully" . "<br>";
	return $dblink;
}	
?>
