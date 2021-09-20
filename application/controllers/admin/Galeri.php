<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	// deklarasi var table
	var $table = 'tb_galeri';

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
		$this->load->model('m_galeri','Model');  //load model m_galeri
		$this->load->library(array(
			'custom_upload',
			'form_validation'
		));
	}

	// fun json datatables landscape
	public function json() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json();
		}
	}

	// fun halaman landscape
	public function index()
	{
		$data['title'] = 'Galeri';
		$data['paket'] = $this->db->order_by('nama', 'asc');
		$data['paket'] = $this->DButama->GetDB('tb_paket');
		// fun view
		$this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_galeri');
		$this->load->view('admin/temp-footer');
	}

	// fun edit landscape
	public function edit($id)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('id' => $id);  //filter berdasarkan id
			$data = $this->DButama->GetDBWhere($this->table,$where)->row();  //load database
			echo json_encode($data);
		}
	}

	// proses update landscape
	public function update()
	{
		if ($this->input->is_ajax_request()) {
			$where  = array('id' => $this->input->post('id'));  //filter berdasarkan id
			$query = $this->DButama->GetDBWhere($this->table,$where);
			$row = $query->row();
			$data = array(
				'status' => $this->input->post('status')
			);
			// fun update
			$this->DButama->UpdateDB($this->table,$where,$data);
			echo json_encode(array("status" => TRUE));
		}
	}

	// fun hapus landscape
	public function hapus($id)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('id' => $id);  //filter berdasarkan id
			$this->DButama->GetDBWhere($this->table,$where)->row();  //load database
			$tes = $this->DButama->GetDBWhere($this->table,$where)->row();
			$query = $this->DButama->DeleteDB($this->table,$where);  //fun delete
			// menghapus gambar di folder
			if($query){
                unlink("assets/images/galeri/".$tes->gambar);
            }
			echo json_encode(array("status" => TRUE));
		}
	}

	// fun proses tambah gambar landscape
	public function proses()
	{
		$file = $this->custom_upload->multiple_upload('gambar', array(
			'upload_path' => 'assets/images/galeri/',
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
		$this->db->insert_batch($this->table, $data);
		// menampilkan pesan sukses
		$this->session->set_flashdata('pesan', '<div class="alert alert-success background-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="icofont icofont-close-line-circled text-white"></i>
						</button>Gambar telah diupload</code></div>');
		redirect('admin/galeri','refresh');
	}

}

/* End of file Galeri.php */
/* Location: ./application/controllers/admin/Galeri.php */