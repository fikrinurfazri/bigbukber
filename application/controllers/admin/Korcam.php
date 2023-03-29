<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Korcam extends CI_Controller
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
        $data['korcam'] = $this->db->get('korcam')->result();
        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/korcam');
        $this->load->view('pages/admin/footer');
    }
    public function v_add()
    {
        $data['user'] = $this->dashboard_m->getuser();
        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/addkorcam');
        $this->load->view('pages/admin/footer');
    }
    public function add()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'kontak' => $this->input->post('kontak'),
        ];
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil Ditambah</div>');

        $this->db->insert('korcam', $data);
        redirect('admin/korcam');
    }
}
