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
                <div class="col-md-1"></div>
                <div class="col-md-6 p-t-5 p-b-3 animated animatedFadeInLeft fadeInLeft">
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
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Paket Tersedia</h2>
                        <img src="<?= base_url('assets/front-end/') ?>img/icon/xti.png.pagespeed.ic.Ce5j9u3J8A.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($paket->result() as $key){ ?>
                    <div class="col-md-4">
                        <div class="pricing__item animated animatedFadeInUp fadeInUp">
                            <h5><?= $key->nama ?></h5>
                            <h2>Rp. <?= rupiah($key->harga) ?></h2>
                            <img src="<?= base_url('assets/front-end/') ?>img/icon/pricing-icon.png" alt="" width="100px">
                            <ul><?= $key->layanan ?></ul>
                            <ul><?= $key->keterangan ?></ul>
                            <!-- <a href="#" class="primary-btn">Book now</a> -->
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
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
                            <p>Lakukan booking dengan mengisikan formulir dibawah ini.</p>
                        </div>
                        <?= $this->session->flashdata('pesan'); ?>
                        <?= $this->session->flashdata('error'); ?>
                        <form class="wrap-form-reservation size22 m-l-r-auto" action="<?= site_url('home/proses') ?>" method="POST" enctype= "multipart/form-data">
                            <div class="row">
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
                                        <?php $jsArray .= "dtPaket['" . $key->id . "'] = { harga:'".addslashes($key->harga)."'};\n"; ?>
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
                                        <option value="500000">Rp 500.000</option>
                                        <option value="1000000">Rp 1.000.000</option>
                                    </select>
                                    <div class="form-group" id="sisa" style="display: none;">
                                        <p style="font-size:0.8em;margin-top:5px;" id="nom">Nominal pembayaran saat hari-H</p>
                                    </div>
                                    <div class="form-group" id="sisa1" style="display: none;">
                                        <p style="font-size:0.8em;margin-top:5px;" id="nom1">Nominal pembayaran saat hari-H</p>
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
                Booking
            </h3>
            <img src="<?= base_url('assets/front-end/') ?>img/icon/xti.png.pagespeed.ic.Ce5j9u3J8A.png" alt="">
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

    <!-- daftar booking -->
    <!-- <section class="section-event">
        <div class="wrap-slick2">
            <div class="slick2">
                <div class="item-slick2 item1-slick2" style="background-image:url(<?= base_url('assets/front-end/') ?>images/xbg-event-01.jpg.pagespeed.ic.Pb0QGM7MlS.jpg)">
                    <div class="wrap-content-slide2 p-t-115 p-b-208">
                        <div class="container">

                            <div class="title-event t-center m-b-52">
                                <span class="tit2 p-l-15 p-r-15">
                                    Daftar
                                </span>
                                <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                    Booking
                                </h3>
                            </div>

                            <div class="blo2 flex-w flex-str animated visible-false" data-appear="zoomIn">
                                <div class="wrap-text-blo2 flex-col-c-m p-t-45 p-b-30">
                                    <h4 class="tit7 t-center m-b-10">
                                        Jadwal
                                    </h4>
                                    <p class="t-center">
                                        Berikut jadwal yang sudah terdaftar bersama kami.
                                    </p>
                                    <div class="flex-sa-m flex-w w-full m-t-40 p-t-45 p-b-30">
                                    </div>
                                    <a href="#" class="txt4 m-t-40">
                                        View Details
                                        <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-slick2-dots"></div>
        </div>
    </section> -->

<script type="text/javascript">
 <?php echo $jsArray; ?> 
    var paket = 0;
    var dp1 = 500000;
    var dp2 = 1000000;
    var total = 0;
    function changeValue(item){ 
        // document.getElementById('nom').textContent = dtPaket[item].harga; 
        paket = dtPaket[item].harga;
    };

    document.getElementById('dp').addEventListener('change', function () {
        var style = this.value == '500000' ? 'block' : 'none';
        document.getElementById('sisa').style.display = style;
        total = paket-dp1;
        var reverse = total.toString().split('').reverse().join(''),
        ribuan  = reverse.match(/\d{1,3}/g);
        ribuan  = ribuan.join('.').split('').reverse().join('');
        document.getElementById('nom').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        
    });

    document.getElementById('dp').addEventListener('change', function () {
        var style = this.value == '1000000' ? 'block' : 'none';
        document.getElementById('sisa1').style.display = style;
        total = paket-dp2;
        var reverse = total.toString().split('').reverse().join(''),
        ribuan  = reverse.match(/\d{1,3}/g);
        ribuan  = ribuan.join('.').split('').reverse().join('');
        document.getElementById('nom1').textContent = 'Nominal pembayaran saat hari-H Rp '+ribuan;
        
    });
</script>

<!-- <script type="text/javascript">
    document.getElementById('dp').addEventListener('change', function () {
        var style = this.value == '1000000' ? 'block' : 'none';
        document.getElementById('sisa').style.display = style;
    });
</script> -->

<!-- DataTables -->
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url() ?>assets/front-end/data/assets/js/init-scripts/data-table/datatables-init.js"></script>  