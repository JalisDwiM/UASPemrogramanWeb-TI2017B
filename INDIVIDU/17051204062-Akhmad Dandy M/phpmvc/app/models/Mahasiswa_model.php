<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES (0, :nim, :nama, :jenkel, :tlahir, :alamat, :kota, :email, :foto, :telp, :prodi, :fakultas)";

        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jenkel', $data['jenkel']);
        $this->db->bind('tlahir', $data['tlahir']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('kota', $data['kota']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('telp', $data['telp']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('fakultas', $data['fakultas']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
                    nim = :nim,
                    nama = :nama,
                    jenkel = :jenkel,
                    tlahir = :tlahir,
                    alamat = :alamat,
                    kota = :kota,
                    email = :email,
                    foto = :foto,
                    telp = :telp,
                    prodi = :prodi,
                    fakultas = :fakultas
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jenkel', $data['jenkel']);
        $this->db->bind('tlahir', $data['tlahir']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('kota', $data['kota']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('telp', $data['telp']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('fakultas', $data['fakultas']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
