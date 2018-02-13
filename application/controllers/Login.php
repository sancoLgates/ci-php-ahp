<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
        if($this->session->userdata('isLog')==TRUE){
            redirect('dashboard','refresh');
        }
    }

    public function index()
    {
      $data['title']='<title> Login -> mysql</title>';
      $this->template->load('role','isi','login',$data);
      
  }
  public function auth()
  {
    $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
    $this->form_validation->set_rules('password','Password','required|max_length[20]');
    if($this->form_validation->run() == FALSE)
    {
        $data['title']='<title> Login -> mysql</title>';
        $this->template->load('role','isi','login',$data);
    }
    else
    {
       if($this->m_login->cek()->num_rows()==1)
       {
         // hash verifikasi
         $secure=$this->m_login->cek()->row();
         if(hash_verified($this->input->post('password'),$secure->password))
         {
            $sessionArray = array(                   
              'isLog'=>TRUE,
              'isId'=>$secure->id,
              'email'=>$secure->email,
              'nama'=>$secure->nama,
              );
            
            $this->session->set_userdata($sessionArray);
            redirect('home','refresh');
        } else 
        {
          $this->session->set_flashdata('pesan','Password invalid');
          redirect('login','refresh');
      }
      
  }else{
   $this->session->set_flashdata('pesan','Email tidak terdaftar');
   redirect('login','refresh');
}
}

}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */