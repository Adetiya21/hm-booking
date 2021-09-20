<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function m_data($data)
	{
		$query = $this->db->get_where('tb_admin', $data);
		return $query;
	}

	public function GetDBWhere($table='',$where='')
	{
		# code...
		return $this->db->get_where($table,$where);

	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */