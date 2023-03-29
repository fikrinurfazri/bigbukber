<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('beranda_m');
    }
    public function index()
    {
        // $data['galeri'] = $this->db->get('t_galeri', 6)->result_array();
        $data['artikel'] = $this->db->get('artikel', 6)->result_array();
        $data['periode'] = $this->db->get('periode')->result_array();
        $cari = $this->input->get('cari');
        $data['galeri'] = $this->beranda_m->getcari($cari);

        $this->load->view('pages/header');
        $this->load->view('pages/nav', $data);
        $this->load->view('front/beranda');
        $this->load->view('pages/footer');
    }
}
