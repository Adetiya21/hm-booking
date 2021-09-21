<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	// deklarasi var table
	var $table = 'tb_tentang';

	public function __construct()
	{
		parent::__construct();
		// cek session admin sudah login
		if ($this->session->userdata('admin_logged_in') !=  "Sudah_Loggin") {
			echo "<script>
			alert('Login Dulu!');";
			echo 'window.location.assign("'.site_url("admin/welcome").'")
			</script>';
		}
	}

	// fun halaman tentang toko
	public function index()
	{
		$data['title'] = 'Informasi Tentang Website';
		$data['tentang'] = $this->DButama->GetDB($this->table)->row();  //load database tb_tentang
		// fun view
		$this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_tentang',$data);
		$this->load->view('admin/temp-footer');
	}

	// proses edit data
	public function proses()
	{
		//load form validasi
		$this->load->library('form_validation');

		// field form validasi
		$config = array(
			array('field' => 'nama','label' => 'Nama','rules' => 'required',),
			array('field' => 'tagline','label' => 'Tagline','rules' => 'required',),
			array('field' => 'no_telp','label' => 'No Telp','rules' => 'required|numeric',),
			// array('field' => 'email','label' => 'Email','rules' => 'required|valid_email'),
			array('field' => 'alamat','label' => 'Alamat','rules' => 'required'),
			array('field' => 'tentang','label' => 'Keterangan','rules' => 'required'),
			// array('field' => 'ig','label' => 'Instagram','rules' => 'required'),
			// array('field' => 'fb','label' => 'Facebook','rules' => 'required'),
			// array('field' => 'iframe','label' => 'Iframe Maps','rules' => 'required'),
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			// menampilkan pesan error
			$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>'.validation_errors().'</strong> 
							</div>');
			redirect('admin/tentang','refresh');
		}else{
			$where  = array('id' => $this->input->post('id'));  //filter bedasarkan id
			$query = $this->DButama->GetDBWhere($this->table,$where);  //load database tb_tentang
			$row = $query->row();
			$data = array(
				'nama' => $this->input->post('nama'),
				'tagline' => $this->input->post('tagline'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'ig' => $this->input->post('ig'),
				'fb' => $this->input->post('fb'),
				// 'iframe' => $this->input->post('iframe'),
				'tentang' => $this->input->post('tentang')
			);

			// hapus logo
				if($this->input->post('remove_photo')) 
				{
					if(file_exists('assets/images/logo/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
						unlink('assets/images/logo/'.$this->input->post('remove_photo'));
					$data['logo'] = null;
				}

				// mengupload logo baru
				if(!empty($_FILES['logo']['name']))
				{
					$upload = $this->_do_upload();
	        		//hapus logo lama di folder
					$row_cek = $this->DButama->GetDBWhere($this->table,$where)->row();
					if(file_exists('assets/images/logo/'.$row_cek->logo) && $row_cek->logo)
						unlink('assets/images/logo/'.$row_cek->logo);
					$data['logo'] = $upload;
				}

			// fun update
			$this->DButama->UpdateDB($this->table,$where,$data);
			// menampilkan pesan sukses
			$this->session->set_flashdata('pesan', '<div class="alert alert-success background-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data sudah di perbaharui</div>');
			redirect('admin/tentang','refresh');
		}
	}

	// proses upload logo
	private function _do_upload()
	{
		$config['upload_path']   = 'assets/images/logo/';  //lokasi folder
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name']  = TRUE;
        $config['file_name']     = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('logo')) //upload and validate
        {
        	$this->session->set_flashdata('upload_error', 'Upload error: '.$this->upload->display_errors('',''));
        }
        return $this->upload->data('file_name');
    }

}

/* End of file Tentang.php */
/* Location: ./application/controllers/admin/Tentang.php */