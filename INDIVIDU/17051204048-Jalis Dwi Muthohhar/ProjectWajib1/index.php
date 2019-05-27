<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem Informasi Mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

</head>
<body>

	<?php
	//tambahkan dbconnect
	include('dbconnect.php');

	//query
	$query = "SELECT * FROM data_mhs";

	$result = mysqli_query($conn , $query);

	?>

	<div class="container bg-success" style="padding-top: 20px; padding-bottom: 20px;">
		<h3><center>CRUD + Search Program Mahasiswa</center></h3>
		<hr>
			<div class="col-sm-8">
				<h3>Tabel Daftar Mahasiswa</h3><hr>
				<table class="table table-striped table-hover dtabel">
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Nama Mahasiswa</th>
							<th>Jenis Kelamin</th>
							<th>Prodi</th>
							<th>Fakultas</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody> 
						
						<?php
							$no = 1;  
							while ($row = mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><img src='img/ikon.png' width='70' height='70'><?php echo $row['foto']; ?></td>
							<td><?php echo $row['nm_mhs']; ?></td>
							<td><?php echo $row['jk_mhs']; ?></td>
							<td><?php echo $row['prodi']; ?></td>
							<td><?php echo $row['fakultas']; ?></td>
							<td>
								<div>
									<a href="detail.php?id=<?php echo $row['nim_mhs'];?>" role="button">Detail |</a>
									<a href="editform.php?id=<?php echo $row['nim_mhs'];?>" role="button"> Edit</a>
									<a href="delete.php?id=<?php echo $row['nim_mhs']?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin menghapus akun?');"><i class="fa fa-fw fa-trash">Delete</a></div>
							</td>
						</tr>

						<?php
							}
							mysqli_close($conn); 
						?>
					</tbody>
				</table>
			</div>
			<div class="row">
			<div class="col-sm-4">
				<h3>Form Tambah Data Mahasiswa</h3><hr>
				<form role="form" action="insert.php" method="post">
					<div class="form-group">
						<label>Nama Mahasiswa</label>
						<input type="text" name="nm_mhs" class="form-control">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<input type="text" name="jk_mhs" class="form-control">
					</div>
					<div class="form-group">
						<label>Prodi</label>
						<input type="text" name="prodi" class="form-control">
					</div>
					<div class="form-group">
						<label>Fakultas</label>
						<input type="text" name="fakultas" class="form-control">
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="text" name="tgl_lahir" class="form-control">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control">
					</div>
					<div class="form-group">
						<label>E-mail</label>
						<input type="text" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input type="text" name="telepon" class="form-control">
					</div>
					<div class="form-group">
						<label>Upload foto</label>
					Image : <input name="picture" type="file" />
					</div>
					<button type="submit" class="btn btn-success btn-block">Tambah Mahasiswa</button>					
				</form>
				
			</div>
		</div>
		
	</div>
</body>

	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
		$('.dtabel').DataTable();
	} );
	</script>

</html> 