<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	// deklarasi var table
	var $table = 'tb_booking';

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
		$this->load->model('m_booking','Model');  //load model m_booking
		$this->load->helper('rupiah');  //load helper rupiah
		
	}

	// fun json datatables
	public function json() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json();
		}
	}

	// fun json datatables
	public function json_perbulan($bln) {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json_perbulan($bln);
		}
	}

	// fun halaman booking
	public function index()
	{
		$data['title'] = 'Data Booking';
		$data['paket'] = $this->db->order_by('nama', 'asc');
		$data['paket'] = $this->DButama->GetDB('tb_paket');
		// fun view
		$this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_booking');
		$this->load->view('admin/temp-footer');
	}

	// fun halaman booking per bulan
	public function perbulan($bulan)
	{
		$data['title'] = 'Data Booking per Bulan';
		$data['bln'] = $bulan;
		if ($bulan==1) { $blnn = 'January'; } elseif ($bulan==2) { $blnn = 'February'; } elseif ($bulan==3) { $blnn = 'March';
		} elseif ($bulan==4) { $blnn = 'April'; } elseif ($bulan==5) { $blnn = 'May'; } elseif ($bulan==6) { $blnn = 'June';
		} elseif ($bulan==7) { $blnn = 'July'; } elseif ($bulan==8) { $blnn = 'August'; } elseif ($bulan==9) { $blnn = 'September';
		} elseif ($bulan==10) { $blnn = 'October'; } elseif ($bulan==11) { $blnn = 'November'; } elseif ($bulan==12) {
			$blnn = 'December';
		}
		$data['blnn'] = $blnn;
		$data['paket'] = $this->db->order_by('nama', 'asc');
		$data['paket'] = $this->DButama->GetDB('tb_paket');

		// fun view
		$this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_booking-perbulan');
		$this->load->view('admin/temp-footer');
	}

	// fun halaman detail booking
	public function detail($id)
	{
		$cek = $this->DButama->GetDBWhere($this->table,array('id'=> $id));
		if ($cek->num_rows() == 1) {
			$data['id'] = $id;
			$data['booking'] = $cek->row();
			$data['title'] = 'Edit Data Booking';
			$data['paket'] = $this->db->order_by('nama', 'asc');
			$data['paket'] = $this->DButama->GetDB('tb_paket');
			// fun view
			$this->load->view('admin/temp-header',$data);
			$this->load->view('admin/v_booking-detail',$data);
			$this->load->view('admin/temp-footer');
		}else{
			redirect('error404','refresh');
		}	
	}

	// proses tambah
	public function tambah()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'id_paket' => $this->input->post('id_paket'),
				'nama' => $this->input->post('nama'),
				'no_hp' => $this->input->post('no_hp'),
				'email' => $this->input->post('email'),
				'tgl_acara' => $this->input->post('tgl_acara'),
				'tgl_booking' => date('Y-m-d H:i:s'),
				'alamat_tinggal' => $this->input->post('alamat_tinggal'),
				'alamat_acara' => $this->input->post('alamat_acara'),
				'status' => $this->input->post('status'),
				'dp' => $this->input->post('dp'),
				'total' => $this->input->post('dp'),
			);
			// upload bukti_transfer
			$bukti_transfer = $_FILES['bukti_transfer']['name'];
			if(!empty($bukti_transfer))
			{
				$upload = $this->_do_upload();
				$data['bukti_transfer'] = $upload;
			}
			// fun tambah
			$this->DButama->AddDB($this->table,$data);
			echo json_encode(array("status" => TRUE));
		}
	}

	// fun hapus
	public function hapus($id)
	{
		if ($this->input->is_ajax_request()) {
			$where = array('id' => $id);  //filter berdasarkan id
			$this->DButama->GetDBWhere($this->table,$where)->row();  //load database
			$tes = $this->DButama->GetDBWhere($this->table,$where)->row();  //load database
			$query = $this->DButama->DeleteDB($this->table,$where);  //fun delete
			echo json_encode(array("status" => TRUE));
			// hapus bukti_transfer di folder
			if($tes->bukti_transfer!==null){
                unlink("assets/images/bukti-transfer/".$tes->bukti_transfer);
            }
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

			$whereHarga  = array('id' => $row->id_paket);  //filter berdasarkan id
			$queryHarga = $this->DButama->GetDBWhere('tb_paket',$whereHarga);
			$rowHarga = $queryHarga->row();
			
			$status=$this->input->post('status');
			if ($status=='Selesai') {
				$data = array(
					'total' => $rowHarga->harga,
					'status' => $status
				);
				// fun update
				$this->DButama->UpdateDB($this->table,$where,$data);
				echo json_encode(array("status" => TRUE));
			} else {
				$data = array(
					'total' => $row->dp,
					'status' => $status
				);
				// fun update
				$this->DButama->UpdateDB($this->table,$where,$data);
				echo json_encode(array("status" => TRUE));
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
}

/* End of file Booking.php */
/* Location: ./application/controllers/admin/Booking.php */