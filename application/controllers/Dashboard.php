<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		 if($this->session->userdata('isLog')==FALSE){
            redirect('logout','refresh');
        }
	}

	public function index()
	{
		$data['title']='<title> Dasboard pages</title>';
        $this->template->load('role','isi','secure_page',$data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */