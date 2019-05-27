<div class="container mt-5">

  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <img src="<?= BASEURL . '/img/' . $data['mhs']['foto']; ?>" alt="" width="500" class="img-thumbnail rounded-circle">
      <h5 class="card-title"><?= $data['mhs']['nama']; ?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['nim']; ?></h6>
      <p class="card-text"><?= $data['mhs']['email']; ?></p>
      <p class="card-text"><?= $data['mhs']['prodi']; ?></p>
      <p class="card-text"><?= $data['mhs']['fakultas']; ?></p>
      <p class="card-text"><?= $data['mhs']['tlahir']; ?></p>
      <p class="card-text"><?= $data['mhs']['kota']; ?></p>
      <p class="card-text"><?= $data['mhs']['alamat']; ?></p>
      <p class="card-text"><?= $data['mhs']['phone']; ?></p>
      <p class="card-text"><?= $data['mhs']['jenkel']; ?></p>
      <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
    </div>
  </div>

</div>