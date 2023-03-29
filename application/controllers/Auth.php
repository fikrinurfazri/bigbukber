<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('auth_m');
    }
    public function index()
    {
        show_404();
    }

    public function login()
    {
        $this->load->library('form_validation');

        $rules = $this->auth_m->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('auth/sign-in');
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->auth_m->login($username, $password)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Login</div>');

            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username atau password salah</div>');
        }
        $this->load->view('auth/sign-in');
    }

    public function logout()
    {
        $this->auth_m->logout();
        redirect(site_url());
    }
}
