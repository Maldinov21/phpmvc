<?php

class User extends Controller
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
        $data['title'] = 'Data User';
        $data['user'] = $this->model('UserModel')->getAllUser();
        $this->admin('templates/header', $data);
        $this->admin('templates/sidebar', $data);
        $this->admin('user/index', $data);
        $this->admin('templates/footer');
    }
    public function cari()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->model('UserModel')->cariUser();
        $data['key'] = $_POST['key'];
        $this->admin('templates/header', $data);
        $this->admin('templates/sidebar', $data);
        $this->admin('user/index', $data);
        $this->admin('templates/footer');
    }

    public function edit($id)
    {

        $data['title'] = 'Edit User';
        $data['user'] = $this->model('UserModel')->getUserById($id);
        $this->admin('templates/header', $data);
        $this->admin('templates/sidebar', $data);
        $this->admin('user/edit', $data);
        $this->admin('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah User';
        $this->admin('templates/header', $data);
        $this->admin('templates/sidebar', $data);
        $this->admin('user/create', $data);
        $this->admin('templates/footer');
    }

    public function simpanUser()
    {
        if ($_POST['password'] == $_POST['ulangi_password']) {
            $row = $this->model('UserModel')->cekUsername();
            if ($row['username'] == $_POST['username']) {
                Flasher::setMessage('Gagal', 'Username yang anda masukan sudah pernah digunakan!', 'danger');
                header('location: ' . BASEURL . '/user/tambah');
                exit;
            } else {
                if ($this->model('UserModel')->tambahUser($_POST) > 0) {
                    Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
                    header('location: ' . BASEURL . '/user');
                    exit;
                } else {
                    Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
                    header('location: ' . BASEURL . '/user');
                    exit;
                }
            }
        } else {
            Flasher::setMessage('Gagal', 'password tidak sama.', 'danger');
            header('location: ' . BASEURL . '/user/tambah');
            exit;
        }
    }

    public function updateUser()
    {
        if (empty($_POST['password'])) {
            if ($this->model('UserModel')->updateDataUser($_POST) > 0) {
                Flasher::setMessage('Berhasil', 'diupdate', 'success');
                header('location: ' . BASEURL . '/user');
                exit;
            } else {
                Flasher::setMessage('Gagal', 'diupdate', 'danger');
                header('location: ' . BASEURL . '/user');
                exit;
            }
        } else {
            if ($_POST['password'] == $_POST['ulangi_password']) {
                if ($this->model('UserModel')->updateDataUser($_POST) > 0) {
                    Flasher::setMessage('Berhasil', 'diupdate', 'success');
                    header('location: ' . BASEURL . '/user');
                    exit;
                } else {
                    Flasher::setMessage('Gagal', 'diupdate', 'danger');
                    header('location: ' . BASEURL . '/user');
                    exit;
                }
            } else {
                Flasher::setMessage('Gagal', 'password tidak sama.', 'danger');
                header('location: ' . BASEURL . '/user/tambah');
                exit;
            }
        }
    }

    public function hapus($id)
    {
        if ($this->model('UserModel')->deleteUser($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . '/user');
            exit;
        }
    }
}
