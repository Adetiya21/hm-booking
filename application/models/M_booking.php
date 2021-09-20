<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_booking extends CI_Model {

	var $table = 'tb_booking';

	public function json() {
		$this->datatables->select('tb_booking.id, tb_booking.nama, tb_booking.no_hp, tb_booking.email, tb_booking.tgl_acara, tb_booking.tgl_booking, tb_booking.alamat_acara, tb_booking.alamat_tinggal, tb_booking.bukti_transfer, tb_booking.status,
			tb_paket.nama as nama_paket');
		$this->datatables->from($this->table);
		$this->datatables->join('tb_paket', 'tb_booking.id_paket=tb_paket.id');
		$this->datatables->add_column('view', '<div align="center">
			<div align="center"><a class="btn btn-primary btn-rounded btn-sm" href="'.site_url("admin/booking/detail/$1").'"><span class="fa fa-eye"></span></a>
			<a class="btn btn-warning btn-rounded btn-sm" href="javascript:void(0)" title="Edit" onclick="edit($1)"> <span class="fa fa-edit"></span></a>
			<a class="btn btn-danger btn-rounded btn-sm" href="javascript:void(0)" title="Hapus" onclick="hapus($1)" > <span class="fa fa-trash"></span></a>
			</div>', 'id');
		return $this->datatables->generate();
	}

	public function json_perbulan($bln) {
		$this->datatables->select('tb_booking.id, tb_booking.nama, tb_booking.no_hp, tb_booking.email, tb_booking.tgl_acara, tb_booking.tgl_booking, tb_booking.alamat_acara, tb_booking.alamat_tinggal, tb_booking.bukti_transfer, tb_booking.status,
			tb_paket.nama as nama_paket');
		$this->datatables->from($this->table);
		$this->datatables->join('tb_paket', 'tb_booking.id_paket=tb_paket.id');
		$this->datatables->where('MONTH(tb_booking.tgl_acara)',$bln);
		$this->datatables->add_column('view', '<div align="center">
			<div align="center"><a class="btn btn-primary btn-rounded btn-sm" href="'.site_url("admin/booking/detail/$1").'"><span class="fa fa-eye"></span></a>
			<a class="btn btn-warning btn-rounded btn-sm" href="javascript:void(0)" title="Edit" onclick="edit($1)"> <span class="fa fa-edit"></span></a>
			<a class="btn btn-danger btn-rounded btn-sm" href="javascript:void(0)" title="Hapus" onclick="hapus($1)" > <span class="fa fa-trash"></span></a>
			</div>', 'id');
		return $this->datatables->generate();
	}

}

/* End of file M_booking.php */
/* Location: ./application/models/M_booking.php */