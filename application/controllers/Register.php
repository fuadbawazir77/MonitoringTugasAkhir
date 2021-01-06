<?php
class Register extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Register_model');
  }

  function index(){
    $data['peminatan'] = $this->Register_model->get_peminatan()->result();
    $this->load->view('register_view', $data);
  }

  function get_sub_peminatan(){
    $id_peminatan = $this->input->post('id_peminatan',TRUE);
    $data = $this->Register_model->get_sub_peminatan($id_peminatan)->result();
    echo json_encode($data);
  }
  
  function daftar(){
			
    $user_name 	    = $this->input->post('username',TRUE);
    $user_email   	= $this->input->post('email',TRUE);
    $user_password	= $this->input->post('password',TRUE);
    $id_peminatan 	= $this->input->post('peminatan',TRUE);
    $nidn 		    	= $this->input->post('dosen',TRUE);
    $user_nidn      = $this->input->post('dosen',TRUE);
    $this->Register_model->register($user_name,$user_email,$user_password,$id_peminatan,$nidn,$user_nidn);
    $this->session->set_flashdata('msg','<div class="alert alert-success">Register Success</div>');
    redirect('login');
    
  }

}