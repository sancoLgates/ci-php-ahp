<?php defined('BASEPATH') OR exit('No direct script access allowed');
class SupirController extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('SupirModel');
    }
    public function index()
    {
        $data['daftarSupir'] = $this->SupirModel->getDataSupir();
        $this->load->view('supir/supir',$data);
        //echo "Selamat Datang di Website Sistem Pendukung Keputusan Supir Terbaik";
    }

    public function dataSupir()
    {
        $data = $this->SupirModel->getDataSupir();
        print_r($data);
    }

    public function loadDataSupir()
    {
        print_r($this->SupirModel->totalBaris());
    }

    public function tambahSupir(){
        $this->SupirModel->tambahSupir();
        echo json_encode(array("status" => 'ok'));
    }
}
