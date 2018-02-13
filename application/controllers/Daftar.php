<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_daftar');
  }

  public function index()
  {
    $data['title']='<title> daftar -> mysql</title>';
    $this->template->load('role','isi','daftar',$data);
    
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
