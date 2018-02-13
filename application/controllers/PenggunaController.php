<?php defined('BASEPATH') OR exit('No direct script access allowed');
// class LoginController extends CI_Controller
// {
//     public function index()
//     {
//         $this->load->view('pengguna');
//         //echo "Selamat Datang di Website Sistem Pendukung Keputusan Supir Terbaik";
//     }
// }

class PenggunaController extends CI_Controller {

  public function __construct(){

    parent::__construct();
    $this->load->helper('url');
    $this->load->model('penggunaModel');
    $this->load->library('session');

  }

  public function index()
  {
    $this->load->view("login");
  }

  public function daftar_pengguna()
  {
    $this->load->view("daftar_pengguna");
  }

  public function register_pengguna()
  {

    $pengguna=array(
    'nama_pengguna'=>$this->input->post('nama_pengguna'),
    'email_pengguna'=>$this->input->post('email_pengguna'),
    'kata_sandi'=>md5($this->input->post('kata_sandi')),
    'status'=>$this->input->post('status')
      );
      print_r($pengguna);
      // exit;

  $email_check=$this->penggunaModel->email_check($pengguna['email_pengguna']);

  if($email_check){
    $this->penggunaModel->daftar_pengguna($pengguna);
    $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
    redirect('pengguna/login_view');

  }
  else{

    $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
    redirect('pengguna');

  }

  }

  public function login_view(){

  $this->load->view("login.php");

  }

  function login_pengguna(){
    $pengguna_login=array(

    'email_pengguna'=>$this->input->post('email_pengguna'),
    'kata_sandi'=>md5($this->input->post('kata_sandi'))

      );
    var_dump($pengguna_login);exit;
      $data=$this->penggunaModel->login_pengguna($pengguna_login['email_pengguna'],$pengguna_login['kata_sandi']);
        if($data)
        {
          $this->session->set_penggunadata('pengguna_id',$data['pengguna_id']);
          $this->session->set_penggunadata('email_pengguna',$data['email_pengguna']);
          $this->session->set_penggunadata('nama_pengguna',$data['nama_pengguna']);
          $this->session->set_penggunadata('status',$data['status']);

          $this->load->view('pengguna_profile.php');

        }
        else{
          $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
          $this->load->view("login.php");

        }


  }

  function pengguna_profile(){

  $this->load->view('pengguna_profile.php');

  }
  public function pengguna_logout(){

    $this->session->sess_destroy();
    redirect('pengguna/login_view', 'refresh');
  }

}

?>