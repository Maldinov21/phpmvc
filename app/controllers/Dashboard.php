<?php

class Dashboard extends Controller
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
        $data['title'] = 'Dashboard';

        $this->admin('templates/header', $data);
        $this->admin('templates/sidebar', $data);
        $this->admin('dashboard/index', $data);
        $this->admin('templates/footer');
    }
}
