<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model{

    function get_info(){
            //$user_id = $this->session->userdata['logged_in']['user_id'];
            $this->db->select('user_id,user_name,user_email,nama_peminatan,nama,user_id_peminatan,user_nidn');
            $this->db->from('tbl_users');
            $this->db->join('peminatan','user_id_peminatan = id_peminatan','left');
            $this->db->join('dosen','user_nidn = nidn','left');	
            $this->db->where($this->session->userdata['user_id']);
            //$this->db->get_where('tbl_users',array('user_id' => $user_id))->row(); 
            $query = $this->db->get();
            return $query;
    }
    


    function get_users_by_id($user_id){
         $query = $this->db->get_where('tbl_users', array('user_id' =>  $user_id));
         //$this->db->from('tbl_users');
         return $query;
    }
    
    public function get_data($id = null){
        $this->db->from('tbl_users');
        if($id != null ){
            $this->db->select('user_id,user_name,user_email,nama_peminatan,nama,user_id_peminatan,user_nidn');
            $this->db->join('peminatan','user_id_peminatan = id_peminatan','left');
            $this->db->join('dosen','user_nidn = nidn','left');
            $this->db->where('user_id',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    //public function get_data_dosen($id = null){
       // $this->db->from('tbl_users');
        //if($id != null ){
           // $this->db->select('user_id,user_name,user_email,nama_peminatan,nama,user_id_peminatan,user_nidn');
            //$this->db->join('peminatan','user_id_peminatan = id_peminatan','left');
            //$this->db->join('dosen','user_nidn = nidn','left');
            //$this->db->where('user_nidn',$id);
       // }
        //$query = $this->db->get();
       // return $query;
    //}

    public function get_data_user_dosen($id = null){
        $this->db->from('tbl_users');
        if($id != null ){
            $this->db->select('user_id,user_name,user_email,nama_peminatan,nama,user_id_peminatan,user_nidn');
            $this->db->join('peminatan','user_id_peminatan = id_peminatan','left');
            $this->db->join('dosen','user_nidn = nidn','left');
            $this->db->where('user_nidn',$id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    public function get_data_dosen_kaprodi($id = null){
        $this->db->from('dosen');
        if($id != null ){
            $this->db->select('nidn,nama,dosen_email,nama_peminatan,dosen_id_peminatan,dosen_jumlah_mhs,dosen_count');
            $this->db->join('peminatan','dosen_id_peminatan = id_peminatan','left');
            //$this->db->where('nidn',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_data_dosen($id = null){
        $this->db->from('dosen');
        if($id != null ){
            $this->db->select('nidn,nama,dosen_email,nama_peminatan,dosen_id_peminatan');
            $this->db->join('peminatan','dosen_id_peminatan = id_peminatan','left');
            $this->db->where('nidn',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_data_kaprodi($id = null){
        $this->db->from('kaprodi');
        if($id != null ){
            $this->db->select('nidn,nama,kaprodi_email');
            //$this->db->join('peminatan','dosen_id_peminatan = id_peminatan','left');
            $this->db->where('nidn',$id);
        }
        $query = $this->db->get();
        return $query;
    }

}