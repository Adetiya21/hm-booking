<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->helper('rupiah');  //load helper rupiah
	}

	// fun halaman home
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['admin'] = $this->DButama->GetDB('tb_admin')->num_rows();  //menghitung jumlah admin
		$data['hp'] = $this->DButama->GetDB('tb_header_portrait')->num_rows();  //menghitung jumlah header
		$data['hl'] = $this->DButama->GetDB('tb_header_landscape')->num_rows();  //menghitung jumlah header
		$data['gl'] = $this->DButama->GetDB('tb_galeri')->num_rows();  //menghitung jumlah galeri
		$data['paket'] = $this->DButama->GetDB('tb_paket')->num_rows();  //menghitung jumlah isi tabel paket
		$data['booking'] = $this->DButama->GetDB('tb_booking')->num_rows();  //menghitung jumlah isi tabel booking

		$query = $this->db->select('sum(total) as total');  //load database
        $query = $this->db->from('tb_booking');  //nama tabel
        $query = $this->db->get();
        $data['total'] = $query->row();

		//menghitung jumlah pesanan bersadarkan status booking
		$data['bs'] = $this->DButama->GetDBWhere('tb_booking', array('status' => 'Belum Selesai'))->num_rows();
		$data['si'] = $this->DButama->GetDBWhere('tb_booking', array('status' => 'Selesai'))->num_rows();

		//load tabel booking
		$query = $this->db->select('tb_booking.id, tb_booking.nama, tb_booking.tgl_acara, tb_booking.tgl_booking, tb_booking.no_hp, tb_paket.nama as nama_paket, tb_paket.harga'); 
        $query = $this->db->from('tb_booking');
        $query = $this->db->join('tb_paket', 'tb_booking.id_paket = tb_paket.id');
        $query = $this->db->order_by('tb_booking.tgl_acara', 'desc');   //mengurutkan data berdasarkan tgl terbaru
		$query = $this->db->limit('6');  //filter tampilan data sebanyak 6
		$query = $this->db->get();
        $data['bk'] = $query;

        $query = $this->db->select('*'); 
        $query = $this->db->from('tb_paket');
        $query = $this->db->order_by('nama', 'asc');   //mengurutkan data berdasarkan tgl terbaru
		$query = $this->db->limit('6');  //filter tampilan data sebanyak 6
		$query = $this->db->get();
        $data['pk'] = $query;
				
		$this->load->view('admin/temp-header',$data);
		$this->load->view('admin/v_index');
		$this->load->view('admin/temp-footer');
	}

	// fun halaman profil
	public function profil($id)
	{
		$cek = $this->DButama->GetDBWhere($this->table,array('id'=> $id));
		if ($cek->num_rows() == 1) {
			$title = array('title' => 'Profil', );
			$data['profil'] = $cek->row();
			$this->load->view('admin/temp-header',$title);
			$this->load->view('admin/v_profil',$data);
			$this->load->view('admin/temp-footer');
		}else{
			redirect('error404','refresh');
		}
	}

	// proses edit profil
	function edit_profil()
	{
		//load form validasi
		$this->load->library('form_validation');

		// field form validasi
		$config = array(
			array('field' => 'nama','label' => 'Nama','rules' => 'required',),
			array('field' => 'username','label' => 'Username','rules' => 'required'),
			array('field' => 'password','label' => 'Password','rules' => 'required')
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			// menampilkan pesan error
			$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>'.validation_errors().'</strong> 
							</div>');
			redirect('admin/home/profil/'.$this->session->userdata('id').'','refresh');
		}else{
			$where  = array('id' => $this->input->post('id'));
			$query = $this->DButama->GetDBWhere($this->table,$where);
			$row = $query->row();
				$pass=$this->input->post('password');
				$hash=password_hash($pass, PASSWORD_DEFAULT);
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => $hash
				);
				// menyimpan data session
				$sess_data['nama'] = $this->input->post('nama');
				$this->session->set_userdata($sess_data);
				// fun update data
				$this->DButama->UpdateDB($this->table,$where,$data);
				// menampilkan pesan sukses
				$this->session->set_flashdata('pesan', '<div class="alert alert-success background-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="icofont icofont-close-line-circled text-white"></i>
						</button>Akun anda telah diperbaharui</code></div>');
				redirect('admin/home/profil/'.$this->session->userdata('id').'','refresh');
		
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/admin/Home.php */