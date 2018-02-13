<?php defined('BASEPATH') OR exit('No direct script access allowed');
class SupirController extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        if($this->session->userdata('isLog')==FALSE){
            redirect('logout','refresh');
        }
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

    public function proses()
    {
      $this->form_validation->set_rules('nama','Nama','trim|required|max_length[128]|xss_clean');
      $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[akun.email]|xss_clean|max_length[128]');
      $this->form_validation->set_rules('password','Password','required|max_length[20]');
      if($this->form_validation->run() == FALSE)
      {
        $data['title']='<title> daftar -> mysql</title>';
        $this->template->load('role','isi','daftar',$data);
      }else
      {
       if($this->m_daftar->add()){
         $this->session->set_flashdata('pesan','Register berhasil, silahkan login');
         redirect('','refresh');
       }else{
         $this->session->set_flashdata('pesan','Register Gagal');
         redirect('daftar','refresh');
       }
     }
    }  
}
