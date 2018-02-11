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
    public function tambahSupir()
    {
        $data=[
            'nama_supir'=>$this->input->post('nama_supir'),
            'tempat_lahir'=>$this->input->post('tempat_lahir'),
            'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
            'alamat'=>$this->input->post('alamat'),
            'mulai_kerja'=>$this->input->post('mulai_kerja')
        ];
        $this->db->insert($this->table,$data);
    }
}