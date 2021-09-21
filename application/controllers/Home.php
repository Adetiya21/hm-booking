<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->helper('rupiah');  //load helper rupiah
	}

	// token digunakan untuk javascript
	public function get_tokens($value="") {
		if ($this->session->userdata('bayand') == "SudahMasukMas") {
			echo $this->security->get_csrf_hash();
		}
	}

	// fun halaman
	public function index()
	{
		$data['title'] = 'Home';
		$data['ten'] = $this->DButama->GetDB('tb_tentang')->row();  //load database
		$data['headerls'] = $this->DButama->GetDBWhere('tb_header_landscape', array('status' => 'Active'));  //load database
		$data['paket'] = $this->DButama->GetDB('tb_paket');  //load database
		$data['booking'] = $this->db->order_by('tgl_acara', 'desc');
		$data['booking'] = $this->DButama->GetDBWhere('tb_booking', array('status' => 'Belum Selesai'));  //load database
		// fun view
		$this->load->view('utama/temp-header', $data);
		$this->load->view('utama/v_home');
		$this->load->view('utama/temp-footer');
	}

	// proses tambah
	public function proses()
	{
		//load form validasi
		$this->load->library('form_validation');

		// field form validasi
		$config = array(
			array('field' => 'id_paket','label' => "Paket",'rules' => 'required'),
			array('field' => 'nama','label' => "Nama Anda",'rules' => 'required'),
			array('field' => 'email','label' => 'Email Anda','rules' => 'required'),
			array('field' => 'no_hp','label' => 'No HP Anda','rules' => 'required|numeric'),
			array('field' => 'tgl_acara','label' => 'Tanggal Acara','rules' => 'required'),
			array('field' => 'alamat_tinggal','label' => 'Alamat Tempat Tinggal','rules' => 'required'),
			array('field' => 'alamat_acara','label' => 'Alamat Tempat Acara','rules' => 'required'),
			array('field' => 'dp','label' => 'Nominal DP','rules' => 'required'),
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			// menampilkan pesan error
			$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>'.validation_errors().'</strong> 
							</div>');
			$this->_Values();
			redirect('home#booking','refresh');
		}else{
			// cek nama barang yang terdaftar
			$tgl_acara  = array('tgl_acara' => $this->input->post('tgl_acara'));
			if ($this->DButama->GetDBWhere('tb_booking',$tgl_acara)->num_rows() == 1) {
				$this->_Values();
				// menampilkan pesan error
				$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Tanggal Acara Sudah diBooking Sebelumnya</strong> 
						</div>');
				redirect('home#booking','refresh');
			}else{
				$data = array(
					'id_paket' => $this->input->post('id_paket'),
					'nama' => $this->input->post('nama'),
					'no_hp' => $this->input->post('no_hp'),
					'email' => $this->input->post('email'),
					'tgl_acara' => $this->input->post('tgl_acara'),
					'tgl_booking' => date('Y-m-d H:i:s'),
					'alamat_tinggal' => $this->input->post('alamat_tinggal'),
					'alamat_acara' => $this->input->post('alamat_acara'),
					'dp' => $this->input->post('dp'),
					'total' => $this->input->post('dp'),
					'status' => 'Belum Selesai',
				);
				
				// upload bukti_transfer
				$bukti_transfer = $_FILES['bukti_transfer']['name'];
				if(!empty($bukti_transfer))
				{
					$upload = $this->_do_upload();
					$data['bukti_transfer'] = $upload;
				}

				// fun tambah
				$this->DButama->AddDB('tb_booking',$data);
				
				echo '<script language="javascript">';
				echo 'alert("Terimakasih Data Berhasil Dikirim")';  
				echo '</script>';
				redirect('home','refresh');
			}
		}
	}

	// proses upload bukti_transfer
	private function _do_upload()
	{
		$config['upload_path']   = 'assets/images/bukti-transfer/';  //lokasi folder
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name']  = TRUE;
        $config['file_name']     = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('bukti_transfer')) //upload and validate
        {
        	$data['inputerror'][] = 'bukti_transfer';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    // fun value validasi
    private function _Values()
	{
		$this->session->set_flashdata('nama', set_value('nama') );
		$this->session->set_flashdata('id_paket', set_value('id_paket') );
		$this->session->set_flashdata('email', set_value('email') );
		$this->session->set_flashdata('no_hp', set_value('no_hp') );
		$this->session->set_flashdata('tgl_acara', set_value('tgl_acara') );
		$this->session->set_flashdata('alamat_tinggal', set_value('alamat_tinggal') );
		$this->session->set_flashdata('alamat_acara', set_value('alamat_acara') );
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */