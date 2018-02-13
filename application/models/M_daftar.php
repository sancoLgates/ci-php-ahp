<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_daftar extends CI_Model {

	public function add(){
		$data= array('nama' => $this->input->post('nama') ,
			'email'=> $this->input->post('email'),
			'password'=>get_hash($this->input->post('password')) 
			);
		return $this->db->insert('akun',$data);
	}
	

}

/* End of file M_daftar.php */
/* Location: ./application/models/M_daftar.php */