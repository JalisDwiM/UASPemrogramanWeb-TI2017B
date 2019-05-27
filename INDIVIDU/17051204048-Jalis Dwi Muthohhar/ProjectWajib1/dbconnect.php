<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mahasiswa";
$conn = mysqli_connect($host, $user, $password, $dbname);

if(!$conn){
	die("error in connection");
}

//echo "database connected"
?>