<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['admin'] = $this->dashboard_m->getadmin();
        $data['korcam'] = $this->db->get('korcam')->result_array();

        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/user');
        $this->load->view('pages/admin/footer');
    }
    public function adduser()
    {
        $data['user'] = $this->dashboard_m->getuser();
        $data['korcam'] = $this->db->get('korcam')->result_array();

        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/adduser');
        $this->load->view('pages/admin/footer');
    }
    public function profile()
    {
        $data['user'] = $this->dashboard_m->getuser();
        $data['profile'] = $this->dashboard_m->user();
        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/profile');
        $this->load->view('pages/admin/footer');
    }
    public function upload()
    {
        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'png|jpg|pdf';
        $config['max_size']             = 1024 * 10;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
            $USERNAME   = $this->input->post('USERNAME', TRUE);
            $PASSWORD   = $this->input->post('PASSWORD', TRUE);
            $LEVEL   = $this->input->post('LEVEL', TRUE);
            $id_korcam   = $this->input->post('id_korcam', TRUE);
            $data = [
                'USERNAME' => $USERNAME,
                'PASSWORD' => password_hash($PASSWORD, PASSWORD_DEFAULT),
                'last_login' => strtotime("now"),
                'LEVEL' => $LEVEL,
                'id_korcam' => $id_korcam,
            ];
            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah</div>');
            redirect('admin/user');
        } else {
            $gambar         = $this->upload->data();
            $berkas         = $gambar['file_name'];
            $USERNAME   = $this->input->post('USERNAME', TRUE);
            $PASSWORD   = $this->input->post('PASSWORD', TRUE);
            $LEVEL   = $this->input->post('LEVEL', TRUE);
            $id_korcam   = $this->input->post('id_korcam', TRUE);
            $data = [
                'USERNAME' => $USERNAME,
                'PASSWORD' => password_hash($PASSWORD, PASSWORD_DEFAULT),
                'last_login' => strtotime("now"),
                'LEVEL' => $LEVEL,
                'id_korcam' => $id_korcam,
                'file'          => $berkas
            ];
            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah</div>');
            redirect('admin/user');
        }
    }
}
