<?php
//add dbconnect

include('dbconnect.php');

$nama = $_POST['nm_mhs'];
$jenkel = $_POST['jk_mhs'];
$prodi = $_POST['prodi'];
$fakultas = $_POST['fakultas'];
$tgllhr = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$picture = $_POST['foto'];

//query

$query =  "INSERT INTO data_mhs(nm_mhs , jk_mhs , prodi , fakultas , tgl_lahir , alamat , email , telepon) VALUES('$nama' , '$jenkel' , '$prodi' , '$fakultas' , '$tgllhr' , '$alamat' , '$email' , '$telepon')";

if (mysqli_query($conn , $query)) {
	# code redicet setelah insert ke index
	header("location:index.php");
	$picture = Image;
}
else{
	echo "ERROR, tidak berhasil". mysqli_error($conn);
}

mysqli_close($conn);
?>