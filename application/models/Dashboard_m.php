<?php

class Dashboard_m extends CI_Model
{
    public function getuser()
    {

        return $this->db->get_where('admin', ['ID_ADMIN' => $this->session->userdata('ID_ADMIN')])->row_array();
    }
    public function user()
    {

        return $this->db->select('*')
            ->from('admin')
            ->join('korcam ', 'korcam.id_korcam = admin.id_korcam', 'left')
            ->where('ID_ADMIN', $this->session->userdata('ID_ADMIN'))
            ->get()->row_array();
    }
    public function getanak()
    {
        $id = $this->db->get_where('admin', ['ID_ADMIN' => $this->session->userdata('ID_ADMIN')])->row_array();
        return $this->db->select('*')
            ->from('data_anak')
            ->join('periode ', 'periode.id_periode = data_anak.id_periode', 'left')
            ->where('ID_ADMIN', $id['ID_ADMIN'])
            ->get()->result_array();
    }
    public function getanakadmin()
    {
        return $this->db->select('*')
            ->from('data_anak')
            ->join('periode ', 'periode.id_periode = data_anak.id_periode', 'left')
            ->get()->result_array();
    }
    public function getadmin()
    {
        return $this->db->select('*')
            ->from('admin')
            ->join('korcam ', 'korcam.id_korcam = admin.id_korcam', 'left')
            ->get()->result_array();
    }
}
