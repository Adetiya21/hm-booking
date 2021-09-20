<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	// deklarasi var table
	var $table = 'tb_admin';

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
		$this->load->model('m_admin','Model');  //load model m_admin
	}

	// fun json datatables
	public function json() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json();
		}
	}

	// fun halaman admin
	public function index()
	{
		$data['title'] = 'Data Admin';
		// fun view
		$this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_admin');
		$this->load->view('admin/temp-footer');
	}

	// fun proses tambah
	public function tambah()
	{
		if ($this->input->is_ajax_request()) {
			// cek username yang terdaftar
			$DataUser  = array('username' => $this->input->post('username'));
			if ($this->DButama->GetDBWhere($this->table,$DataUser)->num_rows() == 1) {
				$data = array();
				$data['inputerror'][] = 'username';
				$data['error_string'][] = 'Username sudah ada / tidak boleh duplikat';
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}else{
				$pass=$this->input->post('password');
				$hash=password_hash($pass, PASSWORD_DEFAULT); //membuat encrypt password
				$data = array(
					'id' => $this->input->post('id'),
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => $hash
				);
				// fungsi tambah admin
				$this->DButama->AddDB($this->table,$data);
				echo json_encode(array("status" => TRUE));
			}
		}
	}

	// fun hapus
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

	// fun proses update
	public function update()
	{
		if ($this->input->is_ajax_request()) {
			$where  = array('id' => $this->input->post('id'));  //filter berdasarkan id
			$query = $this->DButama->GetDBWhere($this->table,$where);  //load database table tb_admin
			$row = $query->row();
			$pass=$this->input->post('password');
			$hash=password_hash($pass, PASSWORD_DEFAULT);  //membuat encrypt password
			// jika password tidak di ganti
			if ($row->password == $this->input->post('password')) {
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username')
				);
				// fun update
				$this->DButama->UpdateDB($this->table,$where,$data);
				echo json_encode(array("status" => TRUE));

			// jika password diganti
			} else {
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => $hash
				);
				// fun update
				$this->DButama->UpdateDB($this->table,$where,$data);
				echo json_encode(array("status" => TRUE));
			}
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/admin/Admin.php */