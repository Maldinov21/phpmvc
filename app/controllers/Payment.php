<?php

class Payment extends Controller
{
    public function index()
    {
        $data['judul'] = 'Payment';
        $this->view('templates/header', $data);
        $this->view('Payment/index');
        $this->view('templates/footer');
    }
}
