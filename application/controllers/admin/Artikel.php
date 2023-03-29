<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
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
        $data['artikel'] = $this->db->get('artikel')->result_array();
        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/artikel');
        $this->load->view('pages/admin/footer');
    }
    public function addartikel()
    {
        $data['periode'] = $this->db->get('periode')->result_array();
        $data['user'] =  $this->db->get_where('admin', ['ID_ADMIN' => $this->session->userdata('ID_ADMIN')])->row_array();

        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/addartikel');
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
            $isi   = $this->input->post('isi', TRUE);
            $judul   = $this->input->post('judul', TRUE);
            $data = [
                'isi' => $isi,
                'judul' => $judul,
                'tanggal' => date('d-m-Y')
            ];
            $this->db->insert('artikel', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah</div>');
            redirect('admin/artikel');
        } else {
            $gambar   = $this->upload->data();
            $berkas   = $gambar['file_name'];
            $isi      = $this->input->post('isi', TRUE);
            $judul      = $this->input->post('judul', TRUE);

            $data = [
                'isi'     => $isi,
                'judul'     => $judul,
                'tanggal' => date('d-m-Y'),
                'file'    => $berkas
            ];
            $this->db->insert('artikel', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah</div>');
            redirect('admin/artikel');
        }
    }
    public function delete($id)
    {
        $this->db->where('id_anak', $id);
        $this->db->delete('data_anak');

        redirect('admin/anak');
    }
}
