<?php

class Home extends Controller
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
        $data['title'] = 'Home Page';

        $this->view('home/index', $data);
    }
}
