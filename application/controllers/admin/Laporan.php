<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
		$this->load->model('m_laporan','Model');  //load model m_laporan
		$this->load->helper('rupiah');  //load helper rupiah
	}

	// fun halaman pesanan
	public function index()
	{
		$data['title'] = 'Data Laporan';
        // fun view
		$this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_laporan');
		$this->load->view('admin/temp-footer');
	}

	// fun halaman laporan berdasarkan bulan
	public function bulan($bulan)
	{
		if ($bulan==1) { $blnn = 'January'; } elseif ($bulan==2) { $blnn = 'February'; } elseif ($bulan==3) { $blnn = 'March';
		} elseif ($bulan==4) { $blnn = 'April'; } elseif ($bulan==5) { $blnn = 'May'; } elseif ($bulan==6) { $blnn = 'June';
		} elseif ($bulan==7) { $blnn = 'July'; } elseif ($bulan==8) { $blnn = 'August'; } elseif ($bulan==9) { $blnn = 'September';
		} elseif ($bulan==10) { $blnn = 'October'; } elseif ($bulan==11) { $blnn = 'November'; } elseif ($bulan==12) {
			$blnn = 'December';
		}
		$data['bln'] = $blnn;  //deklarasi bulan
		$data['blnn'] = $bulan;
		$data['title'] = 'Data Laporan Bulan '.$blnn;
        // fun view
        $this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_laporan-bulan');
		$this->load->view('admin/temp-footer');
	}

	// fun json datatables keseluruhan
	public function json() {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json();
		}
	}

	// fun json datatables berdasarkan bulan
	public function json_bulan($bln) {
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo $this->Model->json_bulan($bln);
		}
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */