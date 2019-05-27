<?php
//include('dbconnected.php');
include('dbconnect.php');

$id = $_GET['nim_mhs'];

//query update
$query = "Select * from data_mhs";

if (mysqli_query($conn, $query)) {
	# credirect ke page index
	header("location:index.php");
	
}
else{
	echo "ERROR, data gagal diupdate". mysqli_error($conn);
}

mysqli_close($conn);
?>