<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function rupiah($data)
	{
    $rupiah =number_format($data, 0, ',', '.' );
	return $rupiah;
    }

    function bulan_indo($data)
    {
    	# code...
    	switch ($data) {
    		case 1:
    		$hasil = 'Januari';
    		break;
    		case 2:    			
    			$hasil = 'Febuari';
    		break;
    		case 3:
    			$hasil = 'Maret';
    		break;
    		case 4:
    			$hasil = 'April';
    		break;
    		case 5:
    			$hasil = 'Mei';
    		break;
    		case 6:
    			$hasil = 'Juni';
    		break;
    		case 7:
    			$hasil = 'Juli';
    		break;
    		case 8:
    			$hasil = 'Agustus';
    		break;
    		case 9:
    			$hasil = 'September';
    		break;
    		case 10:
    			$hasil = 'Oktober';
    		break;
    		case 11:
    			$hasil = 'November';
    		break;
    		case 12:
    			$hasil = 'Desember';
    		break;
    	}
    	return $hasil;
    }