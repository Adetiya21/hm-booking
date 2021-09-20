<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_header extends CI_Model {

	var $tableLandscape = 'tb_header_landscape';
	var $tablePortrait = 'tb_header_portrait';

	public function jsonLandscape() {
		$this->datatables->select('id, gambar, status');
		$this->datatables->from($this->tableLandscape);
		$this->datatables->add_column('view', '<div align="center">
			<a class="btn btn-warning btn-rounded btn-sm" href="javascript:void(0)" title="Edit" onclick="edit($1)"> <span class="fa fa-edit"></span></a>
			<a class="btn btn-danger btn-rounded btn-sm" href="javascript:void(0)" title="Hapus" onclick="hapus($1)" > <span class="fa fa-trash"></span></a>
			</div>', 'id');
		return $this->datatables->generate();
	}	

	public function jsonPortrait() {
		$this->datatables->select('id, gambar, status');
		$this->datatables->from($this->tablePortrait);
		$this->datatables->add_column('view', '<div align="center">
			<a class="btn btn-warning btn-rounded btn-sm" href="javascript:void(0)" title="Edit" onclick="edit($1)"> <span class="fa fa-edit"></span></a>
			<a class="btn btn-danger btn-rounded btn-sm" href="javascript:void(0)" title="Hapus" onclick="hapus($1)" > <span class="fa fa-trash"></span></a>
			</div>', 'id');
		return $this->datatables->generate();
	}

}

/* End of file M_header.php */
/* Location: ./application/models/M_header.php */