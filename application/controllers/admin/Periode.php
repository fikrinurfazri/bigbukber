<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('user_model');
        $this->load->model('dashboard_m');
        $this->load->model('auth_m');
        if (!$this->auth_m->current_user()) {
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['user'] = $this->dashboard_m->getuser();
        $data['periode'] = $this->db->get('periode')->result();
        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/periode');
        $this->load->view('pages/admin/footer');
    }
    public function v_add()
    {
        $data['user'] = $this->dashboard_m->getuser();
        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/addperiode');
        $this->load->view('pages/admin/footer');
    }
    public function add()
    {
        $data = [
            'tahun' => $this->input->post('tahun'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status'),
        ];
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil Ditambah</div>');

        $this->db->insert('periode', $data);
        redirect('admin/periode');
    }
}
