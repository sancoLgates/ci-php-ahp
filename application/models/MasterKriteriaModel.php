<?php

class MasterKriteriaModel extends CI_Model
{
    private $table='master_kriteria';

    public function getDataKriteria()
    {
        $query = $this->db->get($this->table);
        return $query;
    }

    public function totalBaris()
    {
        $data = $this->getDataKriteria();
        return $data->num_rows();
    }

    public function getKriteriaById($id)
    {
      $query = $this->db->get_where($this->table, array('kriteria_id' => $id), 1);
      return $query->result();
    }

    public function tambahKriteria()
    {
        $data=[
          'nama_kriteria'=>$this->input->post('nama_kriteria'),
          'deskripsi'=>$this->input->post('deskripsi'),
          'status'=>$this->input->post('status')
       ];
       return $this->db->insert($this->table, $data);
    }

    public function ubahKriteria()
    {
      $data=[
          'nama_kriteria'=>$this->input->post('nama_kriteria'),
          'deskripsi'=>$this->input->post('deskripsi'),
          'status'=>$this->input->post('status')
       ];

        $this->db->where('kriteria_id', $this->input->post('kriteria_id'));
        return $this->db->update($this->table,$data);
    }

    public function hapusKriteria($id)
    {
      $this->db->delete($this->table, array('kriteria_id' => $id));
      return $this->db->affected_rows();
    }
}