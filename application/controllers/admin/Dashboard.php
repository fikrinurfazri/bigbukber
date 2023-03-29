<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/index');
        $this->load->view('pages/admin/footer');
    }
}
