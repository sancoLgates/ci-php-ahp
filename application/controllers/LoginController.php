<?php defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller
{
    public function index()
    {
        $this->load->view('login');
        //echo "Selamat Datang di Website Sistem Pendukung Keputusan Supir Terbaik";
    }
}