<div class="container mt-3">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
        Tambah Data Mahasiswa
      </button>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="cari mahasiswa.." name="keyword" id="keyword" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg">
      <h3>Daftar Mahasiswa</h3>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Prodi</th>
            <th scope="col">Fakultas</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($data['mhs'] as $mhs) : ?>
            <tr>
              <th scope="row"><?= $i ?></th>
              <td><img src="<?= BASEURL . '/img/' . $mhs['foto']; ?>" alt="" width="100px" class="rounded-circle"></td>
              <td><?= $mhs['nama']; ?></td>
              <td><?= $mhs['jenkel']; ?></td>
              <td><?= $mhs['prodi']; ?></td>
              <td><?= $mhs['fakultas']; ?></td>
              <td>
                <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-success float-right tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">ubah</a>
                <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right">detail</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="number" class="form-control" id="nim" name="nim" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="jenkel">Jenis Kelamin</label>
            <select class="form-control" id="jenkel" name="jenkel">
              <option value="Laki - Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label for="tlahir">Tanggal Lahir</label>
            <input type="text" class="form-control" id="tlahir" name="tlahir" autocomplete="off" placeholder="31/12/1999" required>
          </div>

          <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" class="form-control" id="kota" name="kota" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
          </div>

          <div class="form-group">
            <label for="telp">Telp</label>
            <input type="number" class="form-control" id="telp" name="telp" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="prodi">Prodi</label>
            <select class="form-control" id="prodi" name="prodi">
              <option value="S1 Teknik Informatika">S1 Teknik Informatika</option>
              <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
              <option value="S1 Pendidikan Teknologi Informasi">S1 Pendidikan Teknologi Informasi</option>
              <option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
            </select>
          </div>

          <div class="form-group">
            <label for="foto">Foto</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="foto" name="foto">
              <label class="custom-file-label" for="foto">Choose file</label>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>