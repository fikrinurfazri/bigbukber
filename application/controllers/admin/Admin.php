<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['periode'] = $this->db->get('periode')->result_array();
        $data['korcam'] = $this->db->get('korcam')->result_array();
        // $data['user'] =  $this->db->get_where('admin', ['ID_ADMIN' => $this->session->userdata('ID_ADMIN')])->row_array();
        $data['anak'] = $this->dashboard_m->getanak();
        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/anakadmin');
        $this->load->view('pages/admin/footer');
    }
    public function addanak()
    {
        $data['user'] = $this->dashboard_m->getuser();
        $data['periode'] = $this->db->get('periode')->result_array();
        $data['korcam'] = $this->db->get('korcam')->result_array();
        $data['user'] =  $this->db->get_where('admin', ['ID_ADMIN' => $this->session->userdata('ID_ADMIN')])->row_array();

        $this->load->view('pages/admin/head');
        $this->load->view('pages/admin/nav', $data);
        $this->load->view('admin/addanakadmin');
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
            $nama_anak   = $this->input->post('nama_anak', TRUE);
            $ttl_anak   = $this->input->post('ttl_anak', TRUE);
            $alamat_anak   = $this->input->post('alamat_anak', TRUE);
            $tinggal_di   = $this->input->post('tinggal_di', TRUE);
            $tinggal_dengan   = $this->input->post('tinggal_dengan', TRUE);
            $pendidikan   = $this->input->post('pendidikan', TRUE);
            $id_korcam   = $this->input->post('id_korcam', TRUE);
            $id_periode   = $this->input->post('id_periode', TRUE);
            $catatan   = $this->input->post('catatan', TRUE);
            $id_user   = $this->input->post('id_user', TRUE);
            $data = [
                'nama_anak' => $nama_anak,
                'ttl_anak' => $ttl_anak,
                'alamat_anak' => $alamat_anak,
                'tinggal_di' => $tinggal_di,
                'tinggal_dengan' => $tinggal_dengan,
                'pendidikan' => $pendidikan,
                'id_korcam' => $id_korcam,
                'ID_ADMIN' => $id_user,
                'id_periode' => $id_periode,
                'catatan' => $catatan
            ];
            $this->db->insert('data_anak', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah</div>');
            redirect('admin/anak');
        } else {
            $gambar         = $this->upload->data();
            $berkas         = $gambar['file_name'];
            $nama_anak   = $this->input->post('nama_anak', TRUE);
            $ttl_anak   = $this->input->post('ttl_anak', TRUE);
            $alamat_anak   = $this->input->post('alamat_anak', TRUE);
            $tinggal_di   = $this->input->post('tinggal_di', TRUE);
            $tinggal_dengan   = $this->input->post('tinggal_dengan', TRUE);
            $pendidikan   = $this->input->post('pendidikan', TRUE);
            $id_korcam   = $this->input->post('id_korcam', TRUE);
            $id_periode   = $this->input->post('id_periode', TRUE);
            $catatan   = $this->input->post('catatan', TRUE);
            $id_user   = $this->input->post('id_user', TRUE);
            $data = [
                'nama_anak'     => $nama_anak,
                'id_periode'     => $id_periode,
                'ttl_anak'      => $ttl_anak,
                'alamat_anak'   => $alamat_anak,
                'tinggal_di'    => $tinggal_di,
                'tinggal_dengan' => $tinggal_dengan,
                'pendidikan'    => $pendidikan,
                'id_korcam'     => $id_korcam,
                'catatan'     => $catatan,
                'ID_ADMIN'       => $id_user,
                'file'          => $berkas
            ];
            $this->db->insert('data_anak', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambah</div>');
            redirect('admin/anak');
        }
    }
}
