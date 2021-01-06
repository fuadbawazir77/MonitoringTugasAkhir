<?php
class Register_model extends CI_Model{

	function get_peminatan(){
		$query = $this->db->get('peminatan');
		return $query;	
	}

	function get_sub_peminatan($id_peminatan){
		$query = $this->db->get_where('dosen', array('dosen_id_peminatan' => $id_peminatan));
		return $query;
	}

	function register($user_name,$user_email,$user_password,$id_peminatan,$nidn,$user_nidn){
		$check=$this->db->get_where('dosen',['nidn' => $user_nidn])->row_array();
			if($check){
				if($check['dosen_jumlah_mhs'] < $check['dosen_count']){
					$data = array(
					'user_name' => $user_name,
					'user_email' => $user_email,
					'user_password' => $user_password,
					'user_id_peminatan' => $id_peminatan,
					'user_nidn' => $user_nidn,
					'user_level' => '1'
				);
				$this->db->insert('tbl_users',$data);
				
				$this->db->set('dosen_jumlah_mhs', 'dosen_jumlah_mhs+1', FALSE);
				$this->db->where('nidn',$user_nidn);
				$this->db->update('dosen');

				$this->session->set_flashdata('msg','<div class="alert alert-success">Pendaftaran Suksess</div>');
				//redirect('product');
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-success">Dosen Penuh</div>');
				//$this->session->set_flashdata(
					//'message',
					//'<div class="alert alert-danger" role="alert">Dosen Penuh</div>'
				//);
				redirect('login');
			}
		}
	}
}