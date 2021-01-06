<?php
class Edit_model extends CI_Model{

    function get_peminatan(){
		$query = $this->db->get('peminatan');
		return $query;	
    }
    
    function get_sub_peminatan($id_peminatan){
		$query = $this->db->get_where('dosen', array('dosen_id_peminatan' => $id_peminatan));
		return $query;
	}

	function get_users_by_id($user_id){
		$query = $this->db->get_where('tbl_users', array('user_id' =>  $user_id));
		return $query;
	}
	
	function get_dosen_by_id($user_id){
		$query = $this->db->get_where('dosen', array('nidn' =>  $user_id));
		return $query;
	}
	
	function get_kaprodi_by_id($user_id){
		$query = $this->db->get_where('kaprodi', array('nidn' =>  $user_id));
		return $query;
    }

    function get_info(){ //function get_info($user_id)
		$this->db->select('user_id,user_name,user_email,nama_peminatan,nama,user_id_peminatan,user_nidn');
		$this->db->from('tbl_users');
		$this->db->join('peminatan','user_id_peminatan = id_peminatan','left');
		$this->db->join('dosen','user_nidn = nidn','left');
		//$this->db->where('user_id', $user_id);
		
		
		$query = $this->db->get();
		return $query;
	}

	function get_info_dosen(){
		$this->db->select('nidn,nama,dosen_email,nama_peminatan,dosen_id_peminatan');
		$this->db->from('dosen');
		$this->db->join('peminatan','dosen_id_peminatan = id_peminatan','left');
		$query = $this->db->get();
		return $query;
	}

	function get_info_kaprodi(){
		$this->db->select('nidn,nama,kaprodi_email');
		$this->db->from('kaprodi');
		$query = $this->db->get();
		return $query;
	}
    
    function update_mahasiswa($user_id,$user_name,$user_email,$user_id_peminatan,$user_nidn,$nidn){
		$check=$this->db->get_where('dosen',['nidn' => $user_nidn])->row_array();
		if($check){
			if($check['dosen_jumlah_mhs'] < $check['dosen_count']){
				$this->db->set('user_name', $user_name);
				$this->db->set('user_email', $user_email);
				$this->db->set('user_id_peminatan', $user_id_peminatan);
				$this->db->set('user_nidn', $user_nidn);
				$this->db->where('user_id', $user_id);
				$this->db->update('tbl_users');

				//$this->db->set('dosen_jumlah_mhs', 'dosen_jumlah_mhs-1', FALSE);
				//$this->db->where('nidn',$user_nidn);
				//$this->db->update('dosen');

				$this->db->set('dosen_jumlah_mhs', 'dosen_jumlah_mhs+1', FALSE);
				$this->db->where('nidn',$user_nidn);
				$this->db->update('dosen');

				$this->session->set_flashdata('msg','<div class="alert alert-success">Update Suksess</div>');
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-success">Dosen Penuh</div>');
				//$this->session->set_flashdata(
					//'message',
					//'<div class="alert alert-danger" role="alert">Dosen Penuh</div>'
				//);
				//redirect('page');
			}
		}
	}

	function delete_count_dosen($user_nidn){
				$this->db->set('dosen_jumlah_mhs', 'dosen_jumlah_mhs-1', FALSE);
				$this->db->where('nidn',$user_nidn);
				$this->db->update('dosen');
	}

	function update_dosen($nidn,$nama,$dosen_email,$dosen_password,$dosen_count,$dosen_id_peminatan){
		$this->db->set('nama', $nama);
		$this->db->set('dosen_email', $dosen_email);
		$this->db->set('dosen_password', $dosen_password);
		$this->db->set('dosen_count', $dosen_count);
		$this->db->set('dosen_id_peminatan', $dosen_id_peminatan);
		$this->db->where('nidn', $nidn);
		$this->db->update('dosen');
	}

	function update_kaprodi_dosen($nidn,$nama,$dosen_email,$dosen_password,$dosen_count,$dosen_id_peminatan){
		$this->db->set('nama', $nama);
		$this->db->set('dosen_email', $dosen_email);
		$this->db->set('dosen_password', $dosen_password);
		$this->db->set('dosen_count', $dosen_count);
		$this->db->set('dosen_id_peminatan', $dosen_id_peminatan);
		$this->db->where('nidn', $nidn);
		$this->db->update('dosen');
	}

	function update_kaprodi($nidn,$nama,$kaprodi_email,$kaprodi_password){
		$this->db->set('nama', $nama);
		$this->db->set('kaprodi_email', $kaprodi_email);
		$this->db->set('kaprodi_password', $kaprodi_password);
		$this->db->where('nidn', $nidn);
		$this->db->update('kaprodi');
	}

}