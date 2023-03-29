<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
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
        $data['galeri'] = $this->db->get('t_galeri')->result_array();
        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/galeri');
        $this->load->view('pages/admin/footer');
    }
    public function addgaleri()
    {
        $data['periode'] = $this->db->get('periode')->result_array();
        $data['user'] =  $this->db->get_where('admin', ['ID_ADMIN' => $this->session->userdata('ID_ADMIN')])->row_array();

        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/addgaleri');
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
            $keterangan   = $this->input->post('keterangan', TRUE);
            $periode   = $this->input->post('periode', TRUE);

            $data = [
                'keterangan' => $keterangan,
                'keterangan' => $keterangan,
                'periode' => $periode,
            ];
            $this->db->insert('t_galeri', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah</div>');
            redirect('admin/galeri');
        } else {
            $gambar         = $this->upload->data();
            $berkas         = $gambar['file_name'];
            $keterangan   = $this->input->post('keterangan', TRUE);
            $periode   = $this->input->post('periode', TRUE);

            $data = [
                'keterangan'     => $keterangan,
                'periode'     => $periode,
                'file'          => $berkas
            ];
            $this->db->insert('t_galeri', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah</div>');
            redirect('admin/galeri');
        }
    }
    public function delete($id)
    {
        $this->db->where('id_anak', $id);
        $this->db->delete('data_anak');

        redirect('admin/anak');
    }
}
