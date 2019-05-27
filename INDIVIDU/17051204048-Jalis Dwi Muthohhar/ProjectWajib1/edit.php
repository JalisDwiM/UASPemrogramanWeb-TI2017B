<?php
//include('dbconnected.php');
include('dbconnect.php');

$id = $_GET['nim_mhs'];
$nm_mhs = $_GET['nm_mhs'];
$jenkel = $_GET['jk_mhs'];
$prodi = $_GET['prodi'];
$fakultas = $_GET['fakultas'];
$tgl_lahir = $_GET['tgl_lahir'];
$alamat = $_GET['alamat'];
$email = $_GET['email'];
$telepon = $_GET['telepon'];

//query update
$query = "UPDATE data_mhs SET nm_mhs='$nm_mhs' , jk_mhs='$jenkel' , prodi='$prodi' , fakultas='$fakultas' , tgl_lahir='$tgl_lahir' , alamat='$alamat' , email='$email' , telepon='$telepon' WHERE nim_mhs='$id' ";

if (mysqli_query($conn, $query)) {
	# di direct ke page index
	header("location:index.php");
	
}
else{
	echo "ERROR, data gagal diupdate". mysqli_error($conn);
}

mysqli_close($conn);
?>