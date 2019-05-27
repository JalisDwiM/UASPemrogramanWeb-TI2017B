<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD Mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
$id = $_GET['id']; 

//koneksi database
include('dbconnect.php');

//query
$query = "SELECT * FROM data_mhs WHERE nim_mhs='$id'";
$result = mysqli_query($conn, $query);

?>

<div class="container bg-info" style="padding-top: 20px; padding-bottom: 20px;">

	<h3>Update Data Mahasiswa</h3>
	<form role="form" action="edit.php" method="get">

		<?php
		while ($row = mysqli_fetch_assoc($result)) {
		 	
		?>

		<input type="hidden" name="nim_mhs" value="<?php echo $row['nim_mhs']; ?>">

		<div class="form-group">
			<label>Nama Mahasiswa</label>
			<input type="text" name="nm_mhs" class="form-control" value="<?php echo $row['nm_mhs']; ?>">			
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label>
			<input type="text" name="jk_mhs" class="form-control" value="<?php echo $row['jk_mhs']; ?>">			
		</div>

		<div class="form-group">
			<label>Prodi</label>
			<input type="text" name="prodi" class="form-control" value="<?php echo $row['prodi']; ?>">			
		</div>

		<div class="form-group">
			<label>Fakultas</label>
			<input type="text" name="fakultas" class="form-control" value="<?php echo $row['fakultas']; ?>">			
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="text" name="tgl_lahir" class="form-control" value="<?php echo $row['tgl_lahir']; ?>">			
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">			
		</div>
		<div class="form-group">
			<label>E-mail</label>
			<input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">			
		</div>
		<div class="form-group">
			<label>Fakultas</label>
			<input type="text" name="telepon" class="form-control" value="<?php echo $row['telepon']; ?>">			
		</div>
		<button type="submit" class="btn btn-success btn-block">Update Mahasiswa</button>

		<?php 
		}
		mysqli_close($conn);
		?>				
	</form>
</div>


</body>
</html> 