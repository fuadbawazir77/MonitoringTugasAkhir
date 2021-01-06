<?php
class Login_dosen extends CI_Controller{
  function __construct(){
    parent::__construct();
    //$this->load->model('login_dosen_model');
    $this->load->model('Login_dosen_model','login_dosen_model');
    $this->load->model('Login_kaprodi_model','login_kaprodi_model');
    $this->load->library('session');
  }

  function index(){
    $this->load->view('login_dosen_view');
  }

  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = $this->input->post('password',TRUE); //jika passnya md5 jadi md5($this->input->post('password',TRUE));
    $validate = $this->login_dosen_model->validate($email,$password);
    $validate2 = $this->login_kaprodi_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $nama  = $data['nama'];
        $email = $data['dosen_email'];
        $nidn  = $data['nidn'];
        $level = $data['dosen_level'];
        $sesdata = array(
            'username'  => $nama,
            'email'     => $email,
            'nidn'      => $nidn,
            'level'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1'){
            redirect('page_dosen');

        // access login for staff
        }elseif($level === '2'){
            redirect('page_dosen/staff');

        // access login for author
        }else{
            redirect('page_dosen/author');
        }
    
      }elseif($validate2->num_rows() > 0){
          $data  = $validate2->row_array();
          $nama  = $data['nama'];
          $email = $data['kaprodi_email'];
          $nidn  = $data['nidn'];
          $level = $data['kaprodi_level'];
          $sesdata = array(
              'username'  => $nama,
              'email'     => $email,
              'nidn'      => $nidn,
              'level'     => $level,
              'logged_in' => TRUE
          );
          $this->session->set_userdata($sesdata);
          // access login for admin
          if($level === '1'){
              redirect('page_dosen');
  
          // access login for staff
          }elseif($level === '2'){
              redirect('page_dosen/staff');
  
          // access login for author
          }else{
              redirect('page_dosen/author');
          }  
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('login_dosen');
    }
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('login_dosen');
  }

}
