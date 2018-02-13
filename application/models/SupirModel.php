<?php

class SupirModel extends CI_Model
{
    private $table='supir';
    public function getDataSupir()
    {
        $query = $this->db->get($this->table);
        return $query;
    }

    public function totalBaris()
    {
        $data = $this->getDataSupir();
        return $data->num_rows();
    }

    public function getSupirById($id)
    {
      // $this->db->where('no_induk', $id);
      $query = $this->db->get_where($this->table, array('no_induk' => $id), 1);
      return $query->result();
    }

    public function tambahSupir()
    {
        $data=[
          'no_ktp'=>$this->input->post('no_ktp'),
          'nama_lengkap'=>$this->input->post('nama_lengkap'),
          'alamat_sekarang'=>$this->input->post('alamat_sekarang'),
          'kabupaten_kota'=>$this->input->post('kabupaten_kota'),
          'provinsi'=>$this->input->post('provinsi'),
          'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
          'tempat_lahir'=>$this->input->post('tempat_lahir'),
          'tgl_lahir'=>$this->input->post('tanggal_lahir'),
          'no_telp'=>$this->input->post('no_telephone'),
          'status_perkawinan'=>$this->input->post('status_perkawinan'),
          'mulai_kerja'=>$this->input->post('mulai_kerja'),
       ];
       return $this->db->insert($this->table,$data);
    }

    public function ubahSupir()
    {
      $data=[
          'no_ktp'=>$this->input->post('no_ktp'),
          'nama_lengkap'=>$this->input->post('nama_lengkap'),
          'alamat_sekarang'=>$this->input->post('alamat_sekarang'),
          'kabupaten_kota'=>$this->input->post('kabupaten_kota'),
          'provinsi'=>$this->input->post('provinsi'),
          'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
          'tempat_lahir'=>$this->input->post('tempat_lahir'),
          'tgl_lahir'=>$this->input->post('tanggal_lahir'),
          'no_telp'=>$this->input->post('no_telephone'),
          'status_perkawinan'=>$this->input->post('status_perkawinan'),
          'mulai_kerja'=>$this->input->post('mulai_kerja'),
       ];

        $this->db->where('no_induk', $this->input->post('no_induk'));
        return $this->db->update($this->table,$data);
    }

    public function hapusSupir($id)
    {
      $this->db->delete($this->table, array('no_induk' => $id));
      return $this->db->affected_rows();
    }
}