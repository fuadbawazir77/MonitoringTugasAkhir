<?php
class Edit extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Edit_model','edit_model');
    $this->load->library('session');
  }

    function get_sub_peminatan(){
        $id_peminatan = $this->input->post('id_peminatan',TRUE);
        $data = $this->edit_model->get_sub_peminatan($id_peminatan)->result();
        echo json_encode($data);
    }

    function get_user_data_edit(){
		$user_id = $this->input->post('user_id',TRUE);
		$data = $this->edit_model->get_users_by_id($user_id)->result();
		echo json_encode($data);
	}

	function get_dosen_data_edit(){
		$user_id = $this->input->post('nidn',TRUE);
		$data = $this->edit_model->get_dosen_by_id($user_id)->result();
		echo json_encode($data);
	}

	function get_kaprodi_data_edit(){
		$user_id = $this->input->post('nidn',TRUE);
		$data = $this->edit_model->get_kaprodi_by_id($user_id)->result();
		echo json_encode($data);
	}

	function get_kaprodi_dosen_data_edit(){
		$user_id = $this->input->post('nidn',TRUE);
		$data = $this->edit_model->get_dosen_by_id($user_id)->result();
		echo json_encode($data);
	}

	function get_edit_user(){
		$user_id = $this->uri->segment(3);
		$user_nidn = $this->uri->segment(3);
		$data['user_id'] = $user_id;
		//$data['user_nidn'] = $user_nidn;
		$data['peminatan'] = $this->edit_model->get_info()->result();
		//$data['peminatan'] = $this->product_model->get_peminatan()->result();
		$get_data = $this->edit_model->get_users_by_id($user_id);
		$data_dosen = $this->edit_model->delete_count_dosen($this->session->userdata('user_nidn'));
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['nidn_id'] = $row['user_nidn'];
		}
		$this->load->view('user_editdata_view',$data,$data_dosen);
	}
	
	function get_edit_dosen(){
		$user_id = $this->uri->segment(3);
		$data['nidn'] = $user_id;
		$data['peminatan_dosen'] = $this->edit_model->get_info_dosen()->result();
		//$data['peminatan'] = $this->product_model->get_peminatan()->result();
		$get_data = $this->edit_model->get_dosen_by_id($user_id);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['nidn_id'] = $row['nidn'];
		}
		$this->load->view('dosen_editdata_view',$data);
	}
	
	function get_edit_kaprodi(){
		$user_id = $this->uri->segment(3);
		$data1['nidn'] = $user_id;
		$data2 = $this->edit_model->get_info_kaprodi()->result();
		$get_data = $this->edit_model->get_dosen_by_id($user_id);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['nidn'] = $row['nidn'];
		}
		$this->load->view('kaprodi_editdata_view',$data1,$data2);
	}
	
	function get_edit_kaprodi_dosen(){
		$user_id = $this->uri->segment(3);
		$data['nidn'] = $user_id;
		$data['peminatan_dosen'] = $this->edit_model->get_info_dosen()->result();
		//$data['peminatan'] = $this->product_model->get_peminatan()->result();
		$get_data = $this->edit_model->get_dosen_by_id($user_id);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['nidn_id'] = $row['nidn'];
		}
		$this->load->view('kaprodi_editdosen_view',$data);
	}
    
    function update_user(){
		$user_id 			= $this->input->post('user_id',TRUE);
		$user_name 			= $this->input->post('username',TRUE);
		$user_email 		= $this->input->post('email',TRUE);
		$user_id_peminatan 	= $this->input->post('peminatan',TRUE);
		$nidn 				= $this->input->post('dosen',TRUE);
		$user_nidn 				= $this->input->post('dosen',TRUE);
		$this->edit_model->update_mahasiswa($user_id,$user_name,$user_email,$user_id_peminatan,$nidn,$user_nidn);
        //$this->session->set_flashdata('msg','<div class="alert alert-success">UPDATE SUCCES</div>');
        redirect('page');
	}

	function update_dosen(){
		$nidn	 			= $this->input->post('nidn',TRUE);
		$nama	 			= $this->input->post('username',TRUE);
		$dosen_email 		= $this->input->post('email',TRUE);
		$dosen_password		= $this->input->post('password',TRUE);
		$dosen_count		= $this->input->post('jumlah',TRUE);
		$dosen_id_peminatan = $this->input->post('peminatan',TRUE);
		$this->edit_model->update_dosen($nidn,$nama,$dosen_email,$dosen_password,$dosen_count,$dosen_id_peminatan);
		$this->session->set_flashdata('msg','<div class="alert alert-success">UPDATE SUCCES</div>');
        redirect('page_dosen/staff');
	}

	function update_kaprodi(){
		$nidn	 			= $this->input->post('nidn',TRUE);
		$nama	 			= $this->input->post('username',TRUE);
		$kaprodi_email 		= $this->input->post('email',TRUE);
		$kaprodi_password 	= $this->input->post('password',TRUE);
		$this->edit_model->update_kaprodi($nidn,$nama,$kaprodi_email,$kaprodi_password);
        $this->session->set_flashdata('msg','<div class="alert alert-success">UPDATE SUCCES</div>');
        redirect('page_dosen/author');
	}

	function update_kaprodi_dosen(){
		$nidn	 			= $this->input->post('nidn',TRUE);
		$nama	 			= $this->input->post('username',TRUE);
		$dosen_email 		= $this->input->post('email',TRUE);
		$dosen_password		= $this->input->post('password',TRUE);
		$dosen_count		= $this->input->post('jumlah',TRUE);
		$dosen_id_peminatan = $this->input->post('peminatan',TRUE);
		$this->edit_model->update_kaprodi_dosen($nidn,$nama,$dosen_email,$dosen_password,$dosen_count,$dosen_id_peminatan);
		$this->session->set_flashdata('msg','<div class="alert alert-success">UPDATE SUCCES</div>');
        redirect('page_dosen/author');
	}

}