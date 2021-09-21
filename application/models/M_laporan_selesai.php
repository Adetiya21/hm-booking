<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_selesai extends CI_Model {

	var $table = 'tb_booking';
	var $tablePaket = 'tb_paket';

	// fun load database keseluruhan
	public function json() {
		$this->datatables->select("tb_booking.id, tb_booking.id_paket ,tb_booking.nama, tb_booking.tgl_acara, tb_paket.nama as nama_paket, tb_paket.harga");
		$this->datatables->from($this->table);
		$this->datatables->join('tb_paket','tb_paket.id = tb_booking.id_paket');
		$this->datatables->where('tb_booking.status', 'Selesai');
		$this->datatables->add_column('view', '
			<div align="center"><a class="btn btn-primary btn-rounded btn-sm" href="'.site_url("admin/booking/detail/$1").'"><span class="fa fa-eye"></span> Detail</a>
			</div>', 'id');
		return $this->datatables->generate();
	}

	// fun load database berdasarkan bulan
	public function json_bulan($bln) {
		$this->datatables->select("tb_booking.id, tb_booking.id_paket ,tb_booking.nama, tb_booking.tgl_acara, tb_paket.nama as nama_paket, tb_paket.harga");
		$this->datatables->from($this->table);
		$this->datatables->join('tb_paket','tb_paket.id = tb_booking.id_paket');
		$this->datatables->where('tb_booking.status', 'Selesai');
		$this->datatables->where('MONTH(tb_booking.tgl_acara)',$bln);
		$this->datatables->add_column('view', '
			<div align="center"><a class="btn btn-primary btn-rounded btn-sm" href="'.site_url("admin/booking/detail/$1").'"><span class="fa fa-eye"></span> Detail</a>
			</div>', 'id');
		return $this->datatables->generate();
	}

}

/* End of file M_laporan_selesai.php */
/* Location: ./application/models/M_laporan_selesai.php */