<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// deklarasi var table
	var $table = 'tb_data_user';

	function __construct()
	{
		parent::__construct(); 
		$this->load->helper('rupiah');  //load helper rupiah
	}

	// token digunakan untuk javascript
	public function get_tokens($value="") {
		if ($this->session->userdata('hmproject') == "SudahMasukMas") {
			echo $this->security->get_csrf_hash();
		}
	}

	// fun halaman
	public function index()
	{
		$data['title'] = 'Home HM Project';
		$data['ten'] = $this->DButama->GetDB('tb_tentang')->row();  //load database
		$data['headerls'] = $this->DButama->GetDBWhere('tb_header_landscape', array('status' => 'Active'));  //load database
		$data['paket'] = $this->DButama->GetDBWhere('tb_paket' ,array('status' => 'Active'));  //load database
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
			if ($this->DButama->GetDBWhere('tb_booking',$tgl_acara)->num_rows() > 2) {
				$this->_Values();
				// menampilkan pesan error
				$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Tanggal Acara Sudah diBooking Sebelumnya</strong> 
						</div>');
				redirect('home#booking','refresh');
			}else{
				$nama=$this->input->post('nama');
				$email=$this->input->post('email');
				$dp=$this->input->post('dp');
				$id_paket  = array('id' => $this->input->post('id_paket'));
				$query = $this->DButama->GetDBWhere('tb_paket',$id_paket)->row();
				$paket = $query->nama;
				$harga = $query->harga;
				$promo = $query->promo;
				if ($promo==null) {
					$total = $harga;
					$sisa = $harga-$dp;
				} else {
					$total = $promo;
					$sisa = $promo-$dp;
				}
				$data = array(
					'id_paket' => $this->input->post('id_paket'),
					'nama' => $nama,
					'no_hp' => $this->input->post('no_hp'),
					'email' => $email,
					'tgl_acara' => $this->input->post('tgl_acara'),
					'tgl_booking' => date('Y-m-d H:i:s'),
					'alamat_tinggal' => $this->input->post('alamat_tinggal'),
					'alamat_acara' => $this->input->post('alamat_acara'),
					'dp' => $dp,
					'total' => $dp,
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
				
				// fun email
				$this->sendEmail($nama,$email,$paket,$total,$dp,$sisa);
				
				echo '<script>alert("Terimakasih Data Berhasil Dikirim, silahkan cek pada email anda atau pada menu spam");window.location=document.referrer;</script>';
				// redirect('','refresh');
				
                // header("Location: https://hmproject.art/");
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

	// fun kirim email
	public function sendEmail($nama,$email,$paket,$total,$dp,$sisa)
// 	public function sendEmail()
     {
        $config = ["mailtype" => "html", "charset" => "utf-8", "protocol" => "smtp", "smtp_host" => "smtp.gmail.com", "smtp_user" => "hmproject.art@gmail.com", "smtp_pass" => "adkzmsvrvbosezng", "smtp_crypto" => "ssl", "smtp_port" => 465, "crlf" => "\r\n", "newline" => "\r\n"];

		$this->email->initialize($config);
		$this->load->library("email");
		$this->email->from("hmproject.art@gmail.com","HM Project");
		$this->email->to($email);
		$this->email->subject('Booking HM Project');
        if($total!=$dp){
	        $this->email->message('<b>Hai '.$nama.'</b>,<br><br>Proses booking anda sudah kami terima pada <b>'.date('d F Y').'</b>. Paket yang dipilih yaitu <b>'.$paket.' (Rp '.rupiah($total).')</b> dengan total pembayar awal (DP) sebesar <b>Rp '.rupiah($dp).'</b>. Pembayaran paling lama maksimal 2 hari setelah acara dengan biaya sebesar <b>Rp '.rupiah($sisa).'</b>.<br><br>Terima kasih telah memilih HM Project sebagai partner diacara pernikahan anda. <br><br><br>Salam <br><b>HM Project Team</b>');
        } else {
            $this->email->message('<b>Hai '.$nama.'</b>,<br><br>Proses booking anda sudah kami terima pada <b>'.date('d F Y').'</b>. Paket yang dipilih yaitu <b>'.$paket.' (Rp '.rupiah($total).')</b> dengan total pembayar Lunas sebesar <b>Rp '.rupiah($total).'</b>. <br><br>Terima kasih telah memilih HM Project sebagai partner diacara pernikahan anda. <br><br><br>Salam <br><b>HM Project Team</b>');
        }
	   // $this->email->message('<b>Hai </b>,<br><br>Proses booking anda sudah kami terima pada <b>'.date('d F Y').'</b>. Paket yang dipilih yaitu  (Rp.) dengan total pembayar awal (DP) sebesar <b>Rp. </b>.Pembayaran paling lama maksimal 2 hari setelah acara.<br><br>Terima kasih telah memilih HM Project sebagai partner diacara pernikahan anda. <br><br><br>Salam <br><b>HM Project Team</b>');

	    return $this->email->send();
// 	    if($this->email->send())
// 		{
// 			echo "<script>alert('email sukses dikirim!!!');</script>";
// 			// redirect("Send_Email");
// 		}else{
// 			echo "<script>alert('email gagal dikirim!!!');</script>";
// 			// redirect("Send_Email");
// 			show_error($this->email->print_debugger());

// 		}

     }
     
     public function insertDataUser()
	 {
		if ($this->input->is_ajax_request()) {
			// return $data_user;
			$data_user = $this->input->post('data_user');
			$pass=$this->input->post('password');
			$data = array(
				'data_user' => $data_user,
			);
			$get_last = $this->DButama->GetDBWhere('tb_data_user', array('data_user' => $data_user))->row();
			if ($get_last) {
				echo json_encode(array("status" => TRUE,"data" => $data_user));
			} else {
				// fungsi tambah
				$this->DButama->AddDB($this->table,$data);
				echo json_encode(array("status" => TRUE,"data" => $data_user));
			}
		}
	 }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
