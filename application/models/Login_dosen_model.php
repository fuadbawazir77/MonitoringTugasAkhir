<?php
class Login_dosen_model extends CI_Model{

  function validate($email,$password){
    $this->db->where('dosen_email',$email);
    $this->db->where('dosen_password',$password);
    $result = $this->db->get('dosen',1);
    return $result;
  }

}
