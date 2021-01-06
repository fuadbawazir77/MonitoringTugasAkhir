<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Info_model','info_model');
    $this->load->library('session');
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('level')==='1'){
        $data['mahasiswa'] = $this->info_model->get_data($this->session->userdata('user_id'));
        $this->load->view('user_dashboard_view',$data);
      }else{
          echo "Access Denied";
      }

  }

  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('level')==='2'){
      $data['dosen_data'] = $this->info_model->get_data($this->session->userdata('user_id'));
      $data['dosen'] = $this->info_model->get_data_dosen($this->session->userdata('user_nidn'));
      $this->load->view('dosen_dashboard_view',$data);
    }else{
        echo "Access Denied";
    }
  }

  function author(){
    //Allowing akses to author only
    if($this->session->userdata('level')==='3'){
      $this->load->view('dashboard_view');
    }else{
        echo "Access Denied";
    }
  }

}
