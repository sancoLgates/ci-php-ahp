
<?php
class PenggunaModel extends CI_model 
{

  private $table='pengguna';
  
  public function daftar_pengguna($pengguna) 
  {

    $this->db->insert('pengguna', $pengguna);

  }

  public function login_pengguna($email,$pass)
  {

    $this->db->select('*');
    $this->db->from('pengguna');
    $this->db->where('email_pengguna',$email);
    $this->db->where('kata_sandi',$pass);

    if($query=$this->db->get())
    {
        return $query->row_array();
    }
    else{
      return false;
    }


  }

  public function email_check($email)
  {

    $this->db->select('*');
    $this->db->from('pengguna');
    $this->db->where('email_pengguna',$email);
    $query=$this->db->get();

    if($query->num_rows()>0){
      return false;
    }else{
      return true;
    }

  }
 
 
}

// <?php

// class SupirModel extends CI_Model
// {
//     private $table='supir';
//     public function getDataSupir()
//     {
//         $query = $this->db->get($this->table);
//         return $query;
//     }

//     public function totalBaris()
//     {
//         $data = $this->getDataSupir();
//         return $data->num_rows();
//     }
//     public function tambahSupir()
//     {
//         $data=[
//             'nama_supir'=>$this->input->post('nama_supir'),
//             'tempat_lahir'=>$this->input->post('tempat_lahir'),
//             'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
//             'alamat'=>$this->input->post('alamat'),
//             'mulai_kerja'=>$this->input->post('mulai_kerja')
//         ];
//         $this->db->insert($this->table,$data);
//     }
// }