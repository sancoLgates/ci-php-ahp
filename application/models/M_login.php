<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function cek(){
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->where('email',$this->input->post('email'));
		return $this->db->get();
		
	}
	

}
