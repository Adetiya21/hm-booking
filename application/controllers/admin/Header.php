<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller {

	// deklarasi var table
	var $tableLandscape = 'tb_header_landscape';
	var $tablePortrait = 'tb_header_portrait';

	function __construct()
	{
		parent::__construct();
		// cek session admin sudah login
		if ($this->session->userdata('admin_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('Login Dulu!');";
			echo 'window.location.assign("'.site_url("admin/welcome").'")
			</script>';
		}
		$this->load->model('m_header','Model');  //load model m_header
		$this->load->library(array(
			'custom_upload',
			'form_validation'
		));
	}

	// fun json datatables landscape
	public function jsonLandscape() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->jsonLandscape();
		}
	}

	// fun halaman landscape
	public function header_landscape()
	{
		$data['title'] = 'Header Landscape';
		$data['paket'] = $this->db->order_by('nama', 'asc');
		$data['paket'] = $this->DButama->GetDB('tb_paket');
		// fun view
		$this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_header-landscape');
		$this->load->view('admin/temp-footer');
	}

	// fun edit landscape
	public function edit_landscape($id)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('id' => $id);  //filter berdasarkan id
			$data = $this->DButama->GetDBWhere($this->tableLandscape,$where)->row();  //load database
			echo json_encode($data);
		}
	}

	// proses update landscape
	public function update_landscape()
	{
		if ($this->input->is_ajax_request()) {
			$where  = array('id' => $this->input->post('id'));  //filter berdasarkan id
			$query = $this->DButama->GetDBWhere($this->tableLandscape,$where);
			$row = $query->row();
			$data = array(
				'status' => $this->input->post('status')
			);
			// fun update
			$this->DButama->UpdateDB($this->tableLandscape,$where,$data);
			echo json_encode(array("status" => TRUE));
		}
	}

	// fun hapus landscape
	public function hapus_landscape($id)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('id' => $id);  //filter berdasarkan id
			$this->DButama->GetDBWhere($this->tableLandscape,$where)->row();  //load database
			$tes = $this->DButama->GetDBWhere($this->tableLandscape,$where)->row();
			$query = $this->DButama->DeleteDB($this->tableLandscape,$where);  //fun delete
			// menghapus gambar di folder
			if($query){
                unlink("assets/images/header/".$tes->gambar);
            }
			echo json_encode(array("status" => TRUE));
		}
	}

	// fun proses tambah gambar landscape
	public function proses_landscape()
	{
		$file = $this->custom_upload->multiple_upload('gambar', array(
			'upload_path' => 'assets/images/header/',
			'allowed_types' => 'jpg|jpeg|png', // etc
			'quality' => '50%',
			// 'width' => 800,
            // 'height' => 500
		));

		// menambah gambar multiple
		$data = array();
		foreach ($file as $f) {
			array_push($data, array(
				'status' => 'Active',
				'gambar' => $f
			));
		}
		$this->db->insert_batch($this->tableLandscape, $data);
		// menampilkan pesan sukses
		$this->session->set_flashdata('pesan', '<div class="alert alert-success background-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="icofont icofont-close-line-circled text-white"></i>
						</button>Gambar telah diupload</code></div>');
		redirect('admin/header-landscape','refresh');
	}


// ------------------------------------------------------------------------------------------------
	// fun json datatables landscape
	public function jsonPortrait() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->jsonPortrait();
		}
	}

	// fun halaman landscape
	public function header_portrait()
	{
		$data['title'] = 'Header Landscape';
		$data['paket'] = $this->db->order_by('nama', 'asc');
		$data['paket'] = $this->DButama->GetDB('tb_paket');
		// fun view
		$this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_header-portrait');
		$this->load->view('admin/temp-footer');
	}

	// fun edit landscape
	public function edit_portrait($id)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('id' => $id);  //filter berdasarkan id
			$data = $this->DButama->GetDBWhere($this->tablePortrait,$where)->row();  //load database
			echo json_encode($data);
		}
	}

	// proses update landscape
	public function update_portrait()
	{
		if ($this->input->is_ajax_request()) {
			$where  = array('id' => $this->input->post('id'));  //filter berdasarkan id
			$query = $this->DButama->GetDBWhere($this->tablePortrait,$where);
			$row = $query->row();
			$data = array(
				'status' => $this->input->post('status')
			);
			// fun update
			$this->DButama->UpdateDB($this->tablePortrait,$where,$data);
			echo json_encode(array("status" => TRUE));
		}
	}

	// fun hapus landscape
	public function hapus_portrait($id)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('id' => $id);  //filter berdasarkan id
			$this->DButama->GetDBWhere($this->tablePortrait,$where)->row();  //load database
			$tes = $this->DButama->GetDBWhere($this->tablePortrait,$where)->row();
			$query = $this->DButama->DeleteDB($this->tablePortrait,$where);  //fun delete
			// menghapus gambar di folder
			if($query){
                unlink("assets/images/header/".$tes->gambar);
            }
			echo json_encode(array("status" => TRUE));
		}
	}

	// fun proses tambah gambar landscape
	public function proses_portrait()
	{
		$file = $this->custom_upload->multiple_upload('gambar', array(
			'upload_path' => 'assets/images/header/',
			'allowed_types' => 'jpg|jpeg|png', // etc
			'quality' => '50%',
			// 'width' => 800,
            // 'height' => 500
		));

		// menambah gambar multiple
		$data = array();
		foreach ($file as $f) {
			array_push($data, array(
				'status' => 'Non Active',
				'gambar' => $f
			));
		}
		$this->db->insert_batch($this->tablePortrait, $data);
		// menampilkan pesan sukses
		$this->session->set_flashdata('pesan', '<div class="alert alert-success background-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="icofont icofont-close-line-circled text-white"></i>
						</button>Gambar telah diupload</code></div>');
		redirect('admin/header-portrait','refresh');
	}

}

/* End of file Header.php */
/* Location: ./application/controllers/admin/Header.php */