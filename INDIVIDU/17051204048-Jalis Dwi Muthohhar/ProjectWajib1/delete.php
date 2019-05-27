<?php 

$id = $_GET['id'];

//include(dbconnect.php);
include('dbconnect.php');

//query hapus
$query = "DELETE FROM data_mhs WHERE nim_mhs = '$id' ";

if (mysqli_query($conn , $query)) {
	# redirect ke index.php
	header("location:index.php");
}
else{
	echo "ERROR, data gagal dihapus". mysqli_error($conn);
}

mysqli_close($conn);
?>