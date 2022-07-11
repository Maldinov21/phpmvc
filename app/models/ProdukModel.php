<?php

class ProdukModel
{
    private $table = 'produk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProduk()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getProdukById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahProduk($data)
    {
        $query = "INSERT INTO produk (nama_makanan,ket,harga,gambar) VALUES (:nama_makanan,:ket,:harga,:gambar)";
        $this->db->query($query);
        $this->db->bind('nama_makanan', $data['nama_makanan']);
        $this->db->bind('ket', $data['ket']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataProduk($data)
    {
        $query = "UPDATE produk SET nama_makanan=:nama_makanan, ket=:ket, harga=:harga, gambar=:gambar WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_makanan', $data['nama_makanan']);
        $this->db->bind('ket', $data['ket']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteProduk($id)
    {
        $this->db->query('DELETE  FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariProduk()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_makanan LIKE :key");
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}
