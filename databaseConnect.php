<?php

function OpenCon() {
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "upb2456fenti";
	$db = "elections_upb";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


	return $conn;
}

function CloseCon($conn) {
	$conn -> close();
}

?>
