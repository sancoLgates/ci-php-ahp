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

    public function getSupirById()
    {
      $id = $this->input->post('id');
      // var_dump($this->SupirModel->getSupirById($id));exit;
      echo json_encode($this->SupirModel->getSupirById($id));
    }

    public function tambahSupir(){

        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat_sekarang', 'Alamat Sekarang', 'required');
        $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten Kota', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_telephone', 'Nomor Telephone', 'required');
        $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
        $this->form_validation->set_rules('mulai_kerja', 'Mulai Kerja', 'required');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
          $this->SupirModel->tambahSupir();
           echo json_encode(['success'=>'Data Supir Berhasil ditambahkan.']);
        }
        // $this->SupirModel->tambahSupir();
        // echo json_encode(array("status" => 'ok'));
    }

    public function ubahSupir(){

        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat_sekarang', 'Alamat Sekarang', 'required');
        $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten Kota', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_telephone', 'Nomor Telephone', 'required');
        $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
        $this->form_validation->set_rules('mulai_kerja', 'Mulai Kerja', 'required');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
          $this->SupirModel->ubahSupir();
           echo json_encode(['success'=>'Data Supir Berhasil diubah.']);
        }
    }

    public function hapusSupir()
    {
      
      if (!$this->SupirModel->hapusSupir($this->input->post('no_induk')))
           echo json_encode(['gagal'=>'Gagal menghapus data supir, silahkan coba beberapa saat lagi.']);
       else
           echo json_encode(['success'=>'Data Supir Berhasil dihapus.']);
    }
}
