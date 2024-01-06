<link rel="stylesheet" href="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // fun numerik no telp
    function check_int(evt) {
      var charCode = ( evt.which ) ? evt.which : event.keyCode;
      return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
    };
</script>
    <!-- header -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <?php $no=0; foreach($headerls->result() as $key) { ?>
                <div class="item-slick1 item<?= $no++;?>-slick1" style="background-image:url(<?= base_url('assets/images/header/'.$key->gambar) ?>)">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                            Welcome to
                        </span>
                        <h5 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            <?= $ten->nama ?>
                        </h5>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="wrap-slick1-dots"></div>
        </div>
    </section>

    <!-- about -->
    <section id="tentang" class="section-welcome bg1-pattern p-t-80 p-b-80">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                
                <div class="col-md-3 p-b-30">
                    <div class="wrap-pic-welcome size2 bo-rad-5 hov-img-zoom m-l-r-auto">
                        <img src="<?= base_url('assets/images/logo/'.$ten->logo) ?>" alt="IMG-OUR">
                    </div>
                </div>
                <!-- <div class="col-md-1"></div> -->
                <div class="col-md-7 p-t-5 p-b-3 animated animatedFadeInLeft fadeInLeft">
                    <div class="wrap-text-welcome t-center">
                        <span class="tit2 t-center">
                            <?= $ten->nama ?>
                        </span>
                        <h5 class="tit3 t-center m-b-35 m-t-5">
                            <?= $ten->tagline ?>
                        </h5>
                        <p class="t-center m-b-22 size3 m-l-r-auto">
                            <?= $ten->tentang ?>
                        </p>
                        <!-- <a href="about.html" class="txt4">
                            Our Story
                            <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- price -->
    <section id="paket" class="pricing spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center ">
                    <span class="tit2 p-l-15 p-r-15">
                        Paket
                    </span>
                    <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
                        Pernikahan 2024
                    </h3>
                    <span class="tit2 p-l-15 p-r-15">
                        Untuk Info Di Luar Paket  Hubungi Kami Via Whatsapp Yang Ada di Pojok Kanan Atas
                    </span><br>
                     <span class="tit2 p-l-15 p-r-15">
                        Luar Kota ada Tambahan Biaya Transportasi
                    </span><br>
                    <span class="tit2 p-l-15 p-r-15">
                        Acara Adat BATAK ada Tambahan Biaya 1.500.000
                    </span>
                    
                    
                    
                    <div class="section-title">
                        <!-- <h2>Paket PERNIKAHAN 2021</h2> -->
                        <img src="<?= base_url('assets/front-end/') ?>img/icon/Ce5j9u3J8A.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($paket->result() as $key){ ?>
                    <div class="col-md-4">
                        <div class="pricing__item animated animatedFadeInUp fadeInUp">
                            <h5><?= $key->nama ?></h5>
                            <?php if($key->promo==null) {?>
                            <h2>Rp. <?= rupiah($key->harga) ?></h2>
                            <?php } else { ?>
                                <span>Rp. <?= rupiah($key->harga) ?></span>
                                <h2>Rp. <?= rupiah($key->promo) ?></h2>
                            <?php } ?>
                            <img src="<?= base_url('assets/front-end/') ?>img/icon/pricing-icon.png" alt="" width="100px">
                            <ul><?= $key->layanan ?></ul>
                            <ul><?= $key->keterangan ?></ul>
                            <!-- <a href="#" class="primary-btn">Book now</a> -->
                        </div>
                    </div>
                    
                <?php } ?>

            </div>
        </div>
        <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
                        Harga tidak tetap sewaktu waktu bisa berubah
                    </h3>
                    <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
                        Slot kami terbatas, 1 Tanggal hanya 2 Slot
                    </h3>
                    
    </section>

    <!-- booking -->
    <section id="booking" class="request request--services spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="request__form animated animatedFadeInLeft fadeInLeft">
                        <div class="section-title">
                            <span>Ayo</span>
                            <h2>Booking Sekarang!</h2>
                        </div>
                        <form class="wrap-form-reservation size22 m-l-r-auto" action="<?= site_url('home/proses') ?>" method="POST" enctype= "multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $this->session->flashdata('pesan'); ?>
                                    <?= $this->session->flashdata('error'); ?>
                                </div>
                                <div class="col-md-4">
                                    <span class="txt9">Nama</span>
                                    <div class="size12 bo-rad-5 m-t-3 m-b-23">
                                        <input class="bo-rad-5 sizefull txt10 p-l-20" type="text" name="nama" placeholder="Masukkan Nama Anda" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <span class="txt9">Email</span>
                                    <div class="size12 bo-rad-5 m-t-3 m-b-23">
                                        <input class="bo-rad-5 sizefull txt10 p-l-20" type="text" name="email" placeholder="Masukkan Email Anda" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <span class="txt9">No HP</span>
                                    <div class="size12 bo-rad-5 m-t-3 m-b-23">
                                        <input class="bo-rad-5 sizefull txt10 p-l-20" type="text" name="no_hp" placeholder="Masukkan No Hp Anda" maxlength="13" onkeypress='return check_int(event)' required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="txt9">Paket</span>
                                    <select name="id_paket" class="size12 bo-rad-5 m-t-3 m-b-23" style="color:#666666;padding:10px" onchange="changeValue(this.value)" required />
                                        <option>--- Pilih Paket ---</option>
                                        <?php 
                                        $jsArray = "var dtPaket = new Array();\n";
                                        foreach($paket->result() as $key){ ?>
                                        <option value="<?= $key->id ?>"><?= $key->nama ?></option>
                                        <?php $jsArray .= "dtPaket['" . $key->id . "'] = { harga:'" . addslashes($key->harga) . "',promo:'".addslashes($key->promo)."'};\n"; ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <span class="txt9">Tanggal Acara</span>
                                    <div class="size12 bo-rad-5 m-t-3 m-b-23">
                                        <input class="bo-rad-5 sizefull txt10 p-l-20" type="date" name="tgl_acara" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="txt9">Alamat Tinggal</span>
                                    <textarea class="bo-rad-5 sizefull txt10 p-l-20" name="alamat_tinggal" placeholder="Masukkan Alamat Tempat Tinggal" style="margin-bottom:12px;" required /></textarea>
                                </div>
                                <div class="col-md-6">
                                    <span class="txt9">Alamat Acara</span>
                                    <textarea class="bo-rad-5 sizefull txt10 p-l-20" name="alamat_acara" placeholder="Masukkan Alamat Tempat Acara" style="margin-bottom:12px;" required /></textarea>
                                </div>
                                <div class="col-md-6">
                                    <span class="txt9">Nominal DP</span>
                                    <select name="dp" id="dp" class="size12 bo-rad-5 m-t-3" style="color:#666666;padding:10px" required />
                                        <option>--- Pilih Nominal DP ---</option>
                                        <option value="0">Rp 0</option>
                                        <option value="350000">Rp 350.000</option>
                                        <option value="400000">Rp 400.000</option>
                                        <option value="500000">Rp 500.000</option>
                                        <option value="800000">Rp 800.000</option>
                                        <option value="1000000">Rp 1.000.000</option>
                                    </select>
                                    <div class="form-group" id="sisa00" style="display: none;">
                                        <p style="font-size:0.8em;margin-top:5px;" id="nom00">Nominal pembayaran saat hari-H</p>
                                    </div>
                                    <div class="form-group" id="sisa0" style="display: none;">
                                        <p style="font-size:0.8em;margin-top:5px;" id="nom0">Nominal pembayaran saat hari-H</p>
                                    </div>
                                    <div class="form-group" id="sisa1" style="display: none;">
                                        <p style="font-size:0.8em;margin-top:5px;" id="nom1">Nominal pembayaran saat hari-H</p>
                                    </div>
                                    <div class="form-group" id="sisa2" style="display: none;">
                                        <p style="font-size:0.8em;margin-top:5px;" id="nom2">Nominal pembayaran saat hari-H</p>
                                    </div>
                                    <div class="form-group" id="sisa3" style="display: none;">
                                        <p style="font-size:0.8em;margin-top:5px;" id="nom3">Nominal pembayaran saat hari-H</p>
                                    </div>
                                    <div class="form-group" id="sisa4" style="display: none;">
                                        <p style="font-size:0.8em;margin-top:5px;" id="nom4">Nominal pembayaran saat hari-H</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="txt9">Bukti Transfer</span>
                                    <div class="size12 bo-rad-5 m-t-3 m-b-23">
                                        <input class="bo-rad-5 sizefull txt10 p-l-20" type="file" name="bukti_transfer" required />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="wrap-btn-booking flex-c-m m-t-10">
                                <button type="submit" class="btn3 flex-c-m sizefull p-3 txt11 trans-0-4">
                                    Booking Sekarang!
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- daftar booking -->
    <section id="daftarbooking" class="section-review animated animatedFadeInRight fadeInRight">
        <div class="title-review t-center m-b-2">
            <span class="tit2 p-l-15 p-r-15">
                Daftar
            </span>
            <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
                CALON PENGANTIN 2024
            </h3>
            <img src="<?= base_url('assets/front-end/') ?>img/icon/Ce5j9u3J8A.png" alt="">
        </div>

        <div class="wrap-slick3 mt-5">
            <div class="slick3">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 p-5 bo2 bo-rad-10" style="background: #fff;">
                        <div class="dt-responsive" >
                            <table id="bootstrap-data-table-export" class="table table-responsive table-hover table-xs nowrap" width="100%">
                                <thead>
                                    <tr><th width="1%">No</th>
                                        <th>Tanggal Acara</th>
                                        <th>Nama Calon Pengantin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($booking->result() as $key) {?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= date('d F Y', strtotime($key->tgl_acara)) ?></td>
                                            <td><?= $key->nama ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-slick3-dots m-t-30"></div>
        </div>
    </section>
    
    <!-- modal cek absen seluruh -->
	<div class="modal fade" id="form_ganti_password" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Selamat Datang di Website Pricelist HMProject</h4>
				</div>
				<div class="modal-body">
					<form id="form_datauser">
						<input type="hidden" id="csrfHash" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display:none">
						<div class="form-group">
							<label for="" style="font-size:0.9em">Silahkan masukkan nama Instagram / Email / No HP kalian ya.</label>
							<label for="" style="font-size:0.9em">Jika ingin melihat Paketan Wedding HMProject</label>
							<input type="text" class="form-control" name="data_user" id="data_user" required placeholder="Masukkan salah satu Instagram / E-mail / No HP" autocomplete="off">
							<span style="color:red;font-size:0.8em">*Sertakan simbol @ didepan nama user instagram</span>
						</div>
					</form>
				</div>
				<div class="modal-footer right-content-between">
					<button type="button" class="btn btn-primary" id="simpan_datauser" disabled>Simpan</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

<script src="<?= base_url('assets/front-end/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/back-end') ?>/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/back-end') ?>/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/back-end') ?>/files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/back-end') ?>/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
$('#form_ganti_password').modal('show');

 <?php echo $jsArray; ?> 
    var paket = 0;
    var promo = 0;
    var dp00 = 0;
    var dp0 = 350000;
    var dp1 = 400000;
    var dp2 = 500000;
    var dp3 = 800000;
    var dp4 = 1000000;
    var total = 0;
    function changeValue(item){ 
        paket = dtPaket[item].harga;
        promo = dtPaket[item].promo;
    };
    
    document.getElementById('dp').addEventListener('change', function () {
        var style = this.value == '0' ? 'block' : 'none';
        document.getElementById('sisa00').style.display = style;
        if (promo==0) {
            total = paket-dp00;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom00').textContent = 'Lunas';
        } else {
            total = promo-dp00;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom00').textContent = 'Lunas';
        }
    });

    document.getElementById('dp').addEventListener('change', function () {
        var style = this.value == '350000' ? 'block' : 'none';
        document.getElementById('sisa0').style.display = style;
        if (promo==0) {
            total = paket-dp0;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom0').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        } else {
            total = promo-dp0;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom0').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        }
    });

    document.getElementById('dp').addEventListener('change', function () {
        var style = this.value == '400000' ? 'block' : 'none';
        document.getElementById('sisa1').style.display = style;
        if (promo==0) {
            total = paket-dp1;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom1').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        } else {
            total = promo-dp1;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom1').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        }
    });

    document.getElementById('dp').addEventListener('change', function () {
        var style = this.value == '500000' ? 'block' : 'none';
        document.getElementById('sisa2').style.display = style;
        if (promo==0) {
            total = paket-dp2;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom2').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        } else {
            total = promo-dp2;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom2').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        }
    });
    
    document.getElementById('dp').addEventListener('change', function () {
        var style = this.value == '800000' ? 'block' : 'none';
        document.getElementById('sisa3').style.display = style;
        if (promo==0) {
            total = paket-dp3;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom3').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        } else {
            total = promo-dp3;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom3').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        }
    });
    
    document.getElementById('dp').addEventListener('change', function () {
        var style = this.value == '1000000' ? 'block' : 'none';
        document.getElementById('sisa4').style.display = style;
        if (promo==0) {
            total = paket-dp4;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom4').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        } else {
            total = promo-dp4;
            var reverse = total.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
            document.getElementById('nom4').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        }
    });
    
    function refreshTokens() {
        var url = "<?= base_url()."i/get_tokens" ?>";
        $.get(url, function(theResponse) {
          /* you should do some validation of theResponse here too */
          $('#csrfHash').val(theResponse);;
      });
    }

	$('#data_user').on('keyup change',function () {
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		var phoneno1 = /^\d{11}$/;
		var phoneno = /^\d{12,13}$/;
		var igFormat = /^@\w+([\.-]?\w+)*\w+([\.-]?\w+)+$/;

		let data = $(this).val();
		if(!data.match(mailformat)){
			if(!data.match(phoneno)){
				if(!data.match(phoneno1)){
					if(!data.match(igFormat)){
						$('#simpan_datauser').prop('disabled',true)
					} else {
						$('#simpan_datauser').prop('disabled',false)
					}
				} else {
					$('#simpan_datauser').prop('disabled',false)
				}
			} else {
				$('#simpan_datauser').prop('disabled',false)
			}
		} else {
			$('#simpan_datauser').prop('disabled',false)
		}
	})

	$('#simpan_datauser').click(function() {
        $('#form_ganti_password').modal('hide');
		var url = "<?php echo site_url('home/insertDataUser')?>";

		var formData = new FormData($('#form_datauser')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",

            success: function(data)
            {
                Swal.fire({
					icon: "success",
					title: "Terima Kasih",
					showConfirmButton: true,
					timer: 1500
				});
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });		
	})
</script>

<!-- DataTables -->
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/assets/js/init-scripts/data-table/datatables-init.js"></script>  