<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $file = $_FILES['foto'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileErr = $file['error'];

        $fileExt = explode('.', $fileName);
        $fileActExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActExt, $allowed)) {
            if ($fileErr === 0) {
                if ($fileSize < 1024000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActExt;
                    $fileDest =  $_SERVER['DOCUMENT_ROOT'] . '/phpmvc/public/img/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDest);
                    $_POST['foto'] = $fileNameNew;
                    $_POST['fakultas'] = "Teknik";

                    if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
                        Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                        header('Location: ' . BASEURL . '/mahasiswa');
                        exit;
                    } else {
                        Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                        header('Location: ' . BASEURL . '/mahasiswa');
                        exit;
                    }
                } else {
                    Flasher::setFlash('foto', 'ukuran terlalu besar', 'danger');
                    header('Location: ' . BASEURL . '/mahasiswa');
                    exit;
                }
            } else {
                Flasher::setFlash('foto', 'terjadi kesalahan saat mengupload', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        } else {
            Flasher::setFlash('foto', 'jenis file harus jpg jpeg atau png', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {

        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        $file = $_FILES['foto'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileErr = $file['error'];

        $fileExt = explode('.', $fileName);
        $fileActExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActExt, $allowed)) {
            if ($fileErr === 0) {
                if ($fileSize < 1024000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActExt;
                    $fileDest =  $_SERVER['DOCUMENT_ROOT'] . '/phpmvc/public/img/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDest);
                    $_POST['foto'] = $fileNameNew;
                    $_POST['fakultas'] = "Teknik";
                    if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
                        Flasher::setFlash('berhasil', 'diubah', 'success');
                        header('Location: ' . BASEURL . '/mahasiswa');
                        exit;
                    } else {
                        Flasher::setFlash('gagal', 'diubah', 'danger');
                        header('Location: ' . BASEURL . '/mahasiswa');
                        exit;
                    }
                } else {
                    Flasher::setFlash('foto', 'ukuran terlalu besar', 'danger');
                    header('Location: ' . BASEURL . '/mahasiswa');
                    exit;
                }
            } else {
                Flasher::setFlash('foto', 'terjadi kesalahan saat mengupload', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        } else {
            Flasher::setFlash('foto', 'jenis file harus jpg jpeg atau png', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
