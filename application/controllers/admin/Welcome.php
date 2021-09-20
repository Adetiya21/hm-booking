<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// fun halaman login
	public function index()
	{
		$this->load->view('admin/v_login');
	}

	// proses login
	public function login()
	{
		// recaptcha google
		$recaptcha = $this->input->post('g-recaptcha-response');
		$response = $this->recaptcha->verifyResponse($recaptcha);
		if (!isset($response['success']) || $response['success'] <> true) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Klik Recaptcha</strong> 
				</div>');
			redirect('admin','refresh');
		} else {
			//load form validasi
			$this->load->library('form_validation');

			// field form validasi
			$config = array(
				array('field' => 'username','label' => "Username",'rules' => 'required' ),
				array('field' => 'password','label' => 'Password','rules' => 'required',)
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE)
			{
				// menampilkan pesan error
				$this->session->set_flashdata('username', set_value('username') );
				$this->session->set_flashdata('password', set_value('password') );
				$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>'.validation_errors().'</strong> 
				</div>');
				redirect('admin','refresh');
			}else{
				// load databases dengan filter username
				$query = $this->DButama->GetDBWhere('tb_admin', array('username' => $this->input->post('username'), ));
				if ($query->num_rows() == 0 ) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Username / Password Tidak Ada</strong> 
						</div>');
					redirect('admin','refresh');
				}else{
					$hasil = $query->row();
					if (password_verify($this->input->post('password'), $hasil->password)) {
						foreach ($query->result() as $key ) {
							$sess_data['admin_logged_in'] = "Sudah_Loggin";
							$sess_data['id'] = $key->id;
							$sess_data['nama'] = $key->nama;
							$sess_data['username'] = $key->username;
							$this->session->set_userdata($sess_data);
							$this->session->unset_userdata('user_logged_in');  //mengeluarkan session user
							redirect('admin/home', 'refresh');
						}
					}else{
						// menampilkan pesan error
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Username / Password Tidak Ada</strong> 
							</div>');
						redirect('admin','refresh');
					}
				}
			}
		}
	}

	// proses logout
	function logout()
	{
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
		redirect('admin/welcome','refresh');
	}
}

/* End of file Welcome.php */
/* Location: ./application/controllers/admin/Welcome.php */