<?php

class SeleksiModel extends CI_Model
{
    private $table='seleksi';

    public function getDataSeleksi()
    {
        $query = $this->db->get($this->table);
        return $query;
    }

    public function totalBaris()
    {
        $data = $this->getDataSeleksi();
        return $data->num_rows();
    }

    public function getSeleksiById($id)
    {
      $query = $this->db->get_where($this->table, array('seleksi_id' => $id), 1);
      return $query->result();
    }

    public function tambahSeleksi()
    {
        $data=[
          'nama_seleksi'=>$this->input->post('nama_seleksi'),
          'periode_seleksi'=>$this->input->post('periode_seleksi'),
          'catatan'=>$this->input->post('catatan')
       ];
       return $this->db->insert($this->table, $data);
    }

    public function ubahSeleksi()
    {
      $data=[
          'nama_seleksi'=>$this->input->post('nama_seleksi'),
          'periode_seleksi'=>$this->input->post('periode_seleksi'),
          'catatan'=>$this->input->post('catatan')
       ];

        $this->db->where('seleksi_id', $this->input->post('seleksi_id'));
        return $this->db->update($this->table,$data);
    }

    public function hapusSeleksi($id)
    {
      $this->db->delete($this->table, array('seleksi_id' => $id));
      return $this->db->affected_rows();
    }
}