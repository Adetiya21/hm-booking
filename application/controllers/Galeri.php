<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	// fun halaman
	public function index()
	{
		redirect('galeri/i','refresh');
	}

	// fun halaman
	public function i($page=0)
	{
		$data['title'] = 'Galeri';
		$data['ten'] = $this->DButama->GetDB('tb_tentang')->row();  //load database tb_tentang

		// load database
		$query = $this->db->order_by('id', 'desc');
        $query = $this->DButama->GetDBWhere('tb_galeri', array('status'=>'Active'));  //load database tb_galeri
        $jml = $query;

        $config['base_url'] = base_url('').'galeri/i/';
        $config['total_rows'] = $jml->num_rows();;
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;

        /*Class bootstrap pagination yang digunakan*/
        $config['full_tag_open'] = "<ul class='pagination modal-2' style='position:relative; top:-25px;text-align:center;'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li  class="item-pagination flex-c-m trans-0-4" style="color:#eee;">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='page-item disabled'><li class='item-pagination flex-c-m trans-0-4 active-pagination'><a  style='color:#fff'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li class='item-pagination flex-c-m trans-0-4'>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li class='item-pagination flex-c-m trans-0-4'>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li class='item-pagination flex-c-m trans-0-4'>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li class='item-pagination flex-c-m trans-0-4'>";
        $config['last_tagl_close'] = "</li>";
        // membuat daftar bagian per halaman
        $this->pagination->initialize($config);
        $data['halaman']    = $this->pagination->create_links();

		$query = $this->db->order_by('id', 'desc');
		$query = $this->db->where('status', 'Active');
        $query = $this->db->get('tb_galeri', $config['per_page'], abs($page));
        $data['galeri'] = $query;
		// fun view
		$this->load->view('utama/temp-header', $data);
		$this->load->view('utama/v_galeri');
		$this->load->view('utama/temp-footer');
	}

}

/* End of file Galeri.php */
/* Location: ./application/controllers/Galeri.php */