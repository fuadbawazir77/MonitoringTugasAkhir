<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    function create()
    {
        $this->load->view('form_upload');
    }

    function proses()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'doc|docx|pdf';
        //$sess_id = $this->session->userdata('user_id');
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('berkas')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('form_upload', $error);
        } else {
            $data['nama_berkas'] = $this->upload->data("file_name");
            $data['keterangan_berkas'] = $this->input->post('keterangan_berkas');
            $data['tipe_berkas'] = $this->upload->data('file_ext');
            $data['ukuran_berkas'] = $this->upload->data('file_size');
            $data['user_id_berkas'] = $this->input->post('userid');
            $this->db->insert('tb_berkas', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success">File Berhasil di Upload</div>');
            redirect('page');            
        }
    }

    public function index()
    {
        $userid=$this->session->userdata('user_id');
        $this->db->where('user_id_berkas', $userid);
        $data['berkas'] = $this->db->get('tb_berkas');
        $this->db->where('user_id_comment',$userid);
        $data['comment'] = $this->db->get('tb_comment');
        $this->load->view('tampil_berkas', $data);
    }
    public function index2()
    {

        $idmhs = $this->uri->segment(3);
        $this->db->where('user_id_berkas', $idmhs);
        $data['berkas'] = $this->db->get('tb_berkas');
        $this->db->where('user_id_comment', $idmhs);
        $data['comment'] = $this->db->get('tb_comment');
        $this->load->view('tampil_berkas_dosen', $data);
    }

    function download($id)
    {
        $data = $this->db->get_where('tb_berkas', ['kd_berkas' => $id])->row();
        force_download('uploads/' . $data->nama_berkas, "berkas");
    }

    function comment()
    {
        $data['user_id_comment'] = $this->input->post('userid');
        $data['username'] = $this->input->post('username');
        $data['comment'] = $this->input->post('isi');
        $this->db->insert('tb_comment', $data);
        redirect('upload/index');
    }

    function comment1()
    {
        $idmhs = $this->uri->segment(3);
        $data['user_id_comment'] = $this->input->post('userid');
        $data['username'] = $this->input->post('username');
        $data['comment'] = $this->input->post('isi');
        $this->db->insert('tb_comment', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">comment berhasil</div>');
        redirect('page_dosen/staff');
    }
}
