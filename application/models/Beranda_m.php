<?php

class Beranda_m extends CI_Model
{
    public function getcari($search)
    {
        $this->db->like('periode', $search); //melakukan pencarian data di dalam tabel dengan field 'nama_field' yang mengandung nilai $search
        $query = $this->db->get('t_galeri'); //mengambil data dari tabel
        return $query->result_array();
    }
}
