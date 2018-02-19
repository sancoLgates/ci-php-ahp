<?php defined('BASEPATH') OR exit('No direct script access allowed');
class SeleksiController extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        if($this->session->userdata('isLog')==FALSE){
            redirect('logout','refresh');
        }
        $this->load->model('SeleksiModel');
    }
    public function index()
    {
        $data['daftarSeleksi'] = $this->SeleksiModel->getDataSeleksi();
        $this->load->view('seleksi/index',$data);
        //echo "Selamat Datang di Website Sistem Pendukung Keputusan Seleksi Terbaik";
    }

    public function dataSeleksi()
    {
        $data = $this->SeleksiModel->getDataSeleksi();
        print_r($data);
    }

    public function loadDataSeleksi()
    {
        print_r($this->SeleksiModel->totalBaris());
    }

    public function getSeleksiById()
    {
      $id = $this->input->post('id');
      // var_dump($this->SeleksiModel->getSeleksiById($id));exit;
      echo json_encode($this->SeleksiModel->getSeleksiById($id));
    }

    public function tambahSeleksi(){

        $this->form_validation->set_rules('nama_seleksi', 'Nama Seleksi', 'required');
        $this->form_validation->set_rules('periode_seleksi', 'Periode Seleksi', 'required');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
          $this->SeleksiModel->tambahSeleksi();
           echo json_encode(['success'=>'Data Seleksi Berhasil ditambahkan.']);
        }
        // $this->SeleksiModel->tambahSeleksi();
        // echo json_encode(array("catatan" => 'ok'));
    }

    public function ubahSeleksi(){

        $this->form_validation->set_rules('nama_seleksi', 'Seleksi', 'required');
        $this->form_validation->set_rules('periode_seleksi', 'Periode Seleksi', 'required');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
          if($this->SeleksiModel->ubahSeleksi())
           echo json_encode(['success'=>'Data Seleksi Berhasil diubah.']);
         else
           echo json_encode(['gagal'=>'Data Seleksi tidak Berhasil diubah.']);
        }
    }

    public function hapusSeleksi()
    {
      
      if (!$this->SeleksiModel->hapusSeleksi($this->input->post('seleksi_id')))
           echo json_encode(['gagal'=>'Gagal menghapus data Seleksi, silahkan coba beberapa saat lagi.']);
       else
           echo json_encode(['success'=>'Data Seleksi Berhasil dihapus.']);
    }
}
