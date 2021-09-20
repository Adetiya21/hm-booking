<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

	// deklarasi var table
	var $table = 'tb_paket';

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
		$this->load->model('m_paket','Model');  //load model m_paket
		
	}

	// fun json datatables
	public function json() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json();
		}
	}

	// fun halaman paket
	public function index()
	{
		$data['title'] = 'Data Paket';
		// fun view
		$this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_paket');
		$this->load->view('admin/temp-footer');
	}

	// proses tambah
	public function tambah()
	{
		if ($this->input->is_ajax_request()) {
			$DataUser  = array('nama' => $this->input->post('nama'));
			if ($this->DButama->GetDBWhere($this->table,$DataUser)->num_rows() == 1) {
				$data = array();
				$data['inputerror'][] = 'paket';
				$data['error_string'][] = 'Nama paket sudah ada / tidak boleh duplikat';
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}else{
				$data = array(
					'nama' => $this->input->post('nama'),
					'harga' => $this->input->post('harga'),
					'layanan' => $this->input->post('layanan'),
					'keterangan' => $this->input->post('keterangan'),
					'jml_tim' => $this->input->post('jml_tim')
				);
				// fun tambah
				$this->DButama->AddDB($this->table,$data);
				echo json_encode(array("status" => TRUE));
			}
		}
	}

	// proses hapus
	public function hapus($id)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('id' => $id);  //filter berdasarkan id
			$this->DButama->GetDBWhere($this->table,$where)->row();  //load database
			$this->DButama->DeleteDB($this->table,$where);  //fun delete
			echo json_encode(array("status" => TRUE));
		}
	}

	// fun edit
	public function edit($id)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('id' => $id);  //filter berdasarkan id
			$data = $this->DButama->GetDBWhere($this->table,$where)->row();  //load database
			echo json_encode($data);
		}
	}

	// proses update
	public function update()
	{
		if ($this->input->is_ajax_request()) {
			$where  = array('id' => $this->input->post('id'));  //filter berdasarkan id
			$query = $this->DButama->GetDBWhere($this->table,$where);
			$row = $query->row();
			$data = array(
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'layanan' => $this->input->post('layanan'),
				'keterangan' => $this->input->post('keterangan'),
				'jml_tim' => $this->input->post('jml_tim')
			);
			// fun update
			$this->DButama->UpdateDB($this->table,$where,$data);
			echo json_encode(array("status" => TRUE));
		}
	}

}

/* End of file Paket.php */
/* Location: ./application/controllers/admin/Paket.php */