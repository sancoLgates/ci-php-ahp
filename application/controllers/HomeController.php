<?php defined('BASEPATH') OR exit('No direct script access allowed');
class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        if($this->session->userdata('isLog')==FALSE){
            redirect('logout','refresh');
        }
    }

    public function index()
    {
        $this->load->view('home');
        //echo "Selamat Datang di Website Sistem Pendukung Keputusan Supir Terbaik";
    }
}