<?php defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller
{
    public function index()
    {
        // print_r($this->session->all_userdata());
        $this->load->view('login');
        //echo "Selamat Datang di Website Sistem Pendukung Keputusan Supir Terbaik";
    }
}