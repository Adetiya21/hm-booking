<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      $('.booking').addClass('active');
    });

    // fun numerik
    function check_int(evt) {
        var charCode = ( evt.which ) ? evt.which : event.keyCode;
        return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
    };

    // fun image preview
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
          document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
</script>

    <!-- konten -->
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>DETAIL DATA BOOKING</h4>
                                        <span>Berikut detail data booking.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="<?= site_url('admin/home') ?>"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="<?= site_url('admin/booking') ?>">Booking</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="<?= site_url('admin/booking/detail/'.$id) ?>">Detail</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="page-body">
                        <div class="card">
                            <div class="card-header">
                                <h5>Detail Booking</h5>
                                <span><!-- use class <code>table</code> inside table element --></span>
                                <div class="card-header-right"> <ul class="list-unstyled card-option"> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i><li><i class="feather icon-trash close-card"></i></li></ul> </div>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Paket</label><p style="font-weight: bold;">
                                                <?php $total=0;
                                                 foreach ($paket->result() as $key) {
                                                    if ($booking->id_paket==$key->id) { 
                                                        $total=$key->harga;
                                                        echo $key->nama.' (Rp '. rupiah($key->harga). ')'; }} ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Catin</label>
                                                <p style="font-weight: bold;"><?= $booking->nama ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>No HP</label>
                                                <p style="font-weight: bold;"><a href="https://wa.me/<?= $booking->no_hp ?>"><?= $booking->no_hp ?></a></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                                <p style="font-weight: bold;"><a href="mailto:<?= $booking->email ?>"><?= $booking->email ?></a></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Tinggal</label>
                                                <p style="font-weight: bold;"><?= $booking->alamat_tinggal ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tanggal Acara</label>
                                                <p style="font-weight: bold;"><?= date('d F Y', strtotime($booking->tgl_acara)) ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Acara</label>
                                                <p style="font-weight: bold;"><?= $booking->alamat_acara ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Input Booking</label>
                                                <p style="font-weight: bold;"><?= date('d F Y h:i:s', strtotime($booking->tgl_booking)); ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Nominal DP</label>
                                                <p style="font-weight: bold;">Rp <?php 
                                                $dp= $booking->dp;
                                                $jml = $total-$dp;
                                                echo rupiah($booking->dp).' (Kurang Rp '.rupiah($jml).')'; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label><br>
                                            <?php if ($booking->status=='Belum Selesai') {
                                                echo '<label class="label label-sm label-warning text-center" style="">'.$booking->status.'</label>';
                                                } else if ($booking->status=='Selesai') {
                                                echo '<label class="label label-sm label-info text-center" style="">'.$booking->status.'</label>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Bukti Transfer</label><br>
                                                <?php if ($booking->bukti_transfer==null) {
                                                    echo "<i>Belum ada gambar</i>";
                                                } else{ ?>
                                                <img src="<?php echo base_url('assets/images/bukti-transfer/'.$booking->bukti_transfer); ?>" style="width:100%" class="img-thumbnail">
                                                <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <a href="javascript:history.go(-1)" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>