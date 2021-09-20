<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	// fun halaman kontak toko
	public function index()
	{
		$data['title'] = 'Galeri';
		$data['ten'] = $this->DButama->GetDB('tb_tentang')->row();  //load database tb_tentang
		$data['galeri'] = $this->DButama->GetDBWhere('tb_galeri', array('status'=>'Active'));  //load database tb_galeri
		// fun view
		$this->load->view('utama/temp-header', $data);
		$this->load->view('utama/v_galeri');
		$this->load->view('utama/temp-footer');
	}

}

/* End of file Galeri.php */
/* Location: ./application/controllers/Galeri.php */