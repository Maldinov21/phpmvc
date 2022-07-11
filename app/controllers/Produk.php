<?php

class Produk extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Produk';
        $data['produk'] = $this->model('ProdukModel')->getAllProduk();
        $this->admin('templates/header', $data);
        $this->admin('templates/sidebar', $data);
        $this->admin('produk/index', $data);
        $this->admin('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Produk';
        $data['produk'] = $this->model('ProdukModel')->cariProduk();
        $data['key'] = $_POST['key'];
        $this->admin('templates/header', $data);
        $this->admin('templates/sidebar', $data);
        $this->admin('produk/index', $data);
        $this->admin('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Produk';
        $data['produk'] = $this->model('ProdukModel')->getProdukById($id);
        $this->admin('templates/header', $data);
        $this->admin('templates/sidebar', $data);
        $this->admin('produk/edit', $data);
        $this->admin('templates/footer');
    }

    public function simpanProduk()
    {

        if ($this->model('ProdukModel')->tambahProduk($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . '/produk');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . '/produk');
            exit;
        }
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Produk';
        $data['produk'] = $this->model('ProdukModel')->getAllProduk();
        $this->admin('templates/header', $data);
        $this->admin('templates/sidebar', $data);
        $this->admin('produk/create', $data);
        $this->admin('templates/footer');
    }

    public function updateProduk()
    {
        if ($this->model('ProdukModel')->updateDataProduk($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . BASEURL . '/produk');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . BASEURL . '/produk');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('ProdukModel')->deleteProduk($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . '/produk');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . '/produk');
            exit;
        }
    }
}
