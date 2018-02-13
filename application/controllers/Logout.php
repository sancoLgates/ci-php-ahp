<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller {
  public function index()
  {
$this->session->unset_userdata('isLog');
$this->session->unset_userdata('isId');
session_destroy();
$this->session->set_flashdata('pesan', 'Logut berhasil.');
redirect('login','refresh');
  }
}