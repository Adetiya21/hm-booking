<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_selesai
 extends CI_Controller {

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
		$this->load->model('m_laporan_selesai','Model');  //load model m_laporan
		$this->load->helper('rupiah');  //load helper rupiah
	}

	// fun halaman pesanan
	public function index()
	{
		// $query = $this->db->where( 'tb_booking.status', 'Selesai');   //filter berdasarkan status selesai
  //       $query = $this->db->select('tb_booking.id, tb_booking.id_paket ,tb_booking.nama, tb_booking.tgl_acara, tb_paket.nama as nama_paket,sum(DISTINCT tb_paket.harga) as harga');  //load database
  //       $query = $this->db->from('tb_booking');  //nama tabel
  //       $query = $this->db->join('tb_paket', 'tb_booking.id_paket = tb_paket.id');
  //       $query = $this->db->get();
  //       $data['laporan'] = $query->row();
        $data['title'] = 'Data Laporan Selesai';
        // fun view
		$this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_laporan-sl');
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
		// $query = $this->db->where("DATE_FORMAT(tb_booking.tgl_acara,'%m')", $bulan);  //filter berdasarkan bulan
  //       $query = $this->db->where("tb_booking.status", 'Selesai');   //filter berdasarkan status selesai
  //       $query = $this->db->select('tb_booking.id, tb_booking.id_paket ,tb_booking.nama, tb_booking.tgl_acara, tb_paket.nama as nama_paket,sum(DISTINCT tb_paket.harga) as harga');  //load database
  //       $query = $this->db->from('tb_booking');  //nama tabel
  //       $query = $this->db->join('tb_paket', 'tb_booking.id_paket = tb_paket.id');
  //       $query = $this->db->get();
  //       $data['laporan'] = $query->row();
        $data['title'] = 'Data Laporan Selesai Bulan '.$blnn;
        // fun view
        $this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_laporan-sl-bulan');
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

/* End of file Laporan_selesai.php */
/* Location: ./application/controllers/admin/Laporan_selesai.php */