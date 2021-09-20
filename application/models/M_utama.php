<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_utama extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->output->set_header('X-FRAME-OPTIONS: DENY');
		// Prevent some security threats, per Kevin
		// Turn on IE8-IE9 XSS prevention tools
		$this->output->set_header('X-XSS-Protection: 1; mode=block');
		// Don't allow any pages to be framed - Defends against CSRF
		$this->output->set_header('X-Frame-Options: DENY');
		// prevent mime based attacks
		$this->output->set_header('X-Content-Type-Options: nosniff');
		if ($this->session->userdata('WebsiteMasterBotanical') != "SudahMasukMas") {
			$sess_data['WebsiteMasterBotanical'] = "SudahMasukMas";
			$this->session->set_userdata($sess_data);
		}
	}
	public function GetDB($table='')
	{
		# code...
		return $this->db->get($table);

	}

	public function GetDBWhere($table='',$where='')
	{
		# code...
		return $this->db->get_where($table,$where);

	}

	public function AddDB($table='',$object='')
	{
		# code...
		return $this->db->insert($table, $object);

	}

	public function DeleteDB($table='',$object='')
	{
		$query = $this->db->where($object);
		$query = $this->db->delete($table);
		return $query;
	}

	public function UpdateDB($table='',$where='', $object='')
	{
		return $this->db->update($table, $object, $where);
	}

}

/* End of file M_utama.php */
/* Location: ./application/models/M_utama.php */