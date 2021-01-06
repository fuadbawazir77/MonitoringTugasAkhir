<?php
class Login_kaprodi_model extends CI_Model{

  function validate($email,$password){
    $this->db->where('kaprodi_email',$email);
    $this->db->where('kaprodi_password',$password);
    $result = $this->db->get('kaprodi',1);
    return $result;
  }

}
