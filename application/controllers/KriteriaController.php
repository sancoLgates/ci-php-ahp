<?php defined('BASEPATH') OR exit('No direct script access allowed');
class KriteriaController extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        if($this->session->userdata('isLog')==FALSE){
            redirect('logout','refresh');
        }
        $this->load->model('MasterKriteriaModel');
    }
    public function index()
    {
        $data['daftarKriteria'] = $this->MasterKriteriaModel->getDataKriteria();
        $this->load->view('kriteria/index',$data);
        //echo "Selamat Datang di Website Sistem Pendukung Keputusan Kriteria Terbaik";
    }

    public function dataKriteria()
    {
        $data = $this->MasterKriteriaModel->getDataKriteria();
        print_r($data);
    }

    public function loadDataKriteria()
    {
        print_r($this->MasterKriteriaModel->totalBaris());
    }

    public function getKriteriaById()
    {
      $id = $this->input->post('id');
      // var_dump($this->MasterKriteriaModel->getKriteriaById($id));exit;
      echo json_encode($this->MasterKriteriaModel->getKriteriaById($id));
    }

    public function tambahKriteria(){

        $this->form_validation->set_rules('nama_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
          $this->MasterKriteriaModel->tambahKriteria();
           echo json_encode(['success'=>'Data Kriteria Berhasil ditambahkan.']);
        }
        // $this->MasterKriteriaModel->tambahKriteria();
        // echo json_encode(array("status" => 'ok'));
    }

    public function ubahKriteria(){

        $this->form_validation->set_rules('nama_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
          if($this->MasterKriteriaModel->ubahKriteria())
           echo json_encode(['success'=>'Data Kriteria Berhasil diubah.']);
         else
           echo json_encode(['gagal'=>'Data Kriteria tidak Berhasil diubah.']);
        }
    }

    public function hapusKriteria()
    {
      
      if (!$this->MasterKriteriaModel->hapusKriteria($this->input->post('no_induk')))
           echo json_encode(['gagal'=>'Gagal menghapus data Kriteria, silahkan coba beberapa saat lagi.']);
       else
           echo json_encode(['success'=>'Data Kriteria Berhasil dihapus.']);
    }
}
