<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem Informasi Mahasiswa</title>
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

<div class="container bg-success" style="padding-top: 20px; padding-bottom: 20px;">

	<h3>Informasi Data Mahasiswa</h3>
	<form role="form" action="select.php" method="get">

		<?php
		while ($row = mysqli_fetch_assoc($result)) {		 	
		?>

		<input type="hidden" name="nim_mhs" value="<?php echo $row['nim_mhs']; ?>">

		<div class="form-group">
			<label>Nama Mahasiswa</label><br>
			<?php echo $row['nm_mhs']; ?>
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label><br>
			<?php echo $row['jk_mhs']; ?>			
		</div>

		<div class="form-group">
			<label>Prodi</label><br>
			<?php echo $row['prodi']; ?>		
		</div>

		<div class="form-group">
			<label>Fakultas</label><br>
			<?php echo $row['fakultas']; ?>			
		</div>

		<div class="form-group">
			<label>Tanggal Lahir</label><br>
			<?php echo $row['tgl_lahir']; ?>			
		</div>

		<div class="form-group">
			<label>Alamat</label><br>
			<?php echo $row['alamat']; ?>			
		</div>

		<div class="form-group">
			<label>E-mail</label><br>
			<?php echo $row['email']; ?>			
		</div>

		<div class="form-group">
			<label>Telepon</label><br>
			<?php echo $row['telepon']; ?>			
		</div>
		<a href="index.php"><button class="btn btn-success btn-block">Kembali</button></a>
		<?php 
		}
		mysqli_close($conn);
		?>				
	</form>
</div>


</body>
</html> 