<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      $('.home').addClass('active');
  	});
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
                                        <h4>Dashboard</h4>
                                        <span>Selmat datang admin <?= $this->session->userdata('nama'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="<?= site_url('admin/home') ?>"> <i class="feather icon-home"></i> Dashboard</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="page-body">
						<div class="row">
							<a href="<?= site_url('admin/paket') ?>" class="col-md-3">
								<div class="card bg-c-yellow text-white">
									<div class="card-block">
										<div class="row align-items-center">
											<div class="col">
												<p class="m-b-5">Total Admin</p>
												<h4 class="m-b-0"><?= $admin ?></h4>
											</div>
											<div class="col col-auto text-right">
												<i class="feather icon-users f-40 text-c-yellow"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
							<a href="<?= site_url('admin/paket') ?>" class="col-md-3">
								<div class="card bg-c-pink text-white">
									<div class="card-block">
										<div class="row align-items-center">
											<div class="col">
												<p class="m-b-5">Total Paket</p>
												<h4 class="m-b-0"><?= $paket ?></h4>
											</div>
											<div class="col col-auto text-right">
												<i class="feather icon-layers f-40 text-c-pink"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
							<a href="<?= site_url('admin/booking') ?>" class="col-md-3">
								<div class="card bg-c-blue text-white">
									<div class="card-block">
										<div class="row align-items-center">
											<div class="col pl-3"  style="padding:0;">
												<p class="m-b-5">Header Landscape</p>
												<h4 class="m-b-0"><?= $hl ?></h4>
											</div>
											<div class="col col-auto text-right">
												<i class="feather icon-image f-40 text-c-blue"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
							<!-- <a href="<?= site_url('admin/booking') ?>" class="col-md-3">
								<div class="card bg-c-green text-white">
									<div class="card-block">
										<div class="row align-items-center">
											<div class="col">
												<p class="m-b-5">Header Portrait</p>
												<h4 class="m-b-0"><?= $hp ?></h4>
											</div>
											<div class="col col-auto text-right">
												<i class="feather icon-image f-40 text-c-green"></i>
											</div>
										</div>
									</div>
								</div>
							</a> -->
							<a href="<?= site_url('admin/galeri') ?>" class="col-md-3">
								<div class="card bg-c-green text-white">
									<div class="card-block">
										<div class="row align-items-center">
											<div class="col">
												<p class="m-b-5">Galeri</p>
												<h4 class="m-b-0"><?= $gl ?></h4>
											</div>
											<div class="col col-auto text-right">
												<i class="feather icon-image f-40 text-c-green"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
							<div class="col-md-3">
								<div class="card">
									<div class="card-block">
										<div class="row align-items-center">
											<div class="col-12">
												<h4 class="text-c-yellow f-w-600"><?= $booking ?></h4>
												<h6 class="text-muted m-b-0">Data</h6>
											</div>
											<!-- <div class="col-4 text-right">
												<i class="feather icon-bar-chart f-28"></i>
											</div> -->
										</div>
									</div>
									<div class="card-footer bg-c-yellow">
										<div class="row align-items-center">
											<div class="col-12">
												<p class="text-white m-b-0">Total Booking</p>
											</div>
											<!-- <div class="col-3 text-right">
												<i class="feather icon-trending-up text-white f-16"></i>
											</div> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-block">
										<div class="row align-items-center">
											<div class="col-12">
												<h4 class="text-c-pink f-w-600"><?= $bs ?></h4>
												<h6 class="text-muted m-b-0">Data</h6>
											</div>
											<!-- <div class="col-4 text-right">
												<i class="feather icon-bar-chart f-28"></i>
											</div> -->
										</div>
									</div>
									<div class="card-footer bg-c-pink">
										<div class="row align-items-center">
											<div class="col-12">
												<p class="text-white m-b-0">Belum Selesai</p>
											</div>
											<!-- <div class="col-3 text-right">
												<i class="feather icon-trending-up text-white f-16"></i>
											</div> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-block">
										<div class="row align-items-center">
											<div class="col-12">
												<h4 class="text-c-blue f-w-600"><?= $si ?></h4>
												<h6 class="text-muted m-b-0">Data</h6>
											</div>
											<!-- <div class="col-4 text-right">
												<i class="feather icon-bar-chart f-28"></i>
											</div> -->
										</div>
									</div>
									<div class="card-footer bg-c-blue">
										<div class="row align-items-center">
											<div class="col-12">
												<p class="text-white m-b-0">Selesai</p>
											</div>
											<!-- <div class="col-3 text-right">
												<i class="feather icon-trending-up text-white f-16"></i>
											</div> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-block">
										<div class="row align-items-center">
											<div class="col-12">
												<h4 class="text-c-green f-w-600">Rp <?= rupiah($total->total); ?></h4>
												<h6 class="text-muted m-b-0">Total</h6>
											</div>
											<!-- <div class="col-4 text-right">
												<i class="feather icon-bar-chart f-28"></i>
											</div> -->
										</div>
									</div>
									<div class="card-footer bg-c-green">
										<div class="row align-items-center">
											<div class="col-12">
												<p class="text-white m-b-0">Pemasukan</p>
											</div>
											<!-- <div class="col-3 text-right">
												<i class="feather icon-trending-up text-white f-16"></i>
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-8">
								<div class="card">
		                            <div class="card-header">
		                                <h5>Booking Terbaru</h5>
		                                <span><!-- use class <code>table</code> inside table element --></span>
		                                <div class="card-header-right"> <ul class="list-unstyled card-option"> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i><li><i class="feather icon-trash close-card"></i></li></ul> </div>
		                            </div>
		                            <div class="card-block">
		                                <div class="dt-responsive">
		                                    <table class="table table-responsive table-xs table-hover" width="100%">
		                                        <thead>
		                                            <th>Tanggal Input</th>
		                                            <th>Tanggal Acara</th>
		                                            <th>Nama Catin</th>
		                                            <th>No.Telp</th>
		                                            </tr>
		                                        </thead>
		                                        <tbody>
		                                        	<?php $no=0;
		                                        	foreach ($bk->result() as $key) { 
		                                        		$no++;
		                                        	?>
		                                        	<tr>
		                                        		<td><a href="<?= site_url('admin/booking/detail/'.$key->id) ?>"><?= date('d F Y h:i:s', strtotime($key->tgl_booking)); ?></a></td>
		                                        		<td><?= date('d F Y', strtotime($key->tgl_acara)); ?></td>
		                                        		<td><?= $key->nama ?></td>
		                                        		<td><a href="tel:<?= $key->no_hp ?>"><?= $key->no_hp ?></a></td>
		                                        	</tr>
			                                        <?php } ?>
		                                        </tbody>
		                                    </table>
		                                </div>
		                                <hr style="margin-top: 0">
										<div class="pull-right">
											<a href="<?= site_url('admin/booking') ?>">Selengkapnya..</a>
										</div>
		                            </div>
		                        </div>
							</div>
							<div class="col-md-4">
								<div class="card">
		                            <div class="card-header">
		                                <h5>Paket</h5>
		                                <span><!-- use class <code>table</code> inside table element --></span>
		                                <div class="card-header-right"> <ul class="list-unstyled card-option"> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i><li><i class="feather icon-trash close-card"></i></li></ul> </div>
		                            </div>
		                            <div class="card-block">
		                                <div class="dt-responsive">
		                                    <table class="table table-responsive table-xs table-hover" width="100%">
		                                        <thead>
		                                            <th>Nama Paket</th>
		                                            <th>Harga</th>
		                                            </tr>
		                                        </thead>
		                                        <tbody>
		                                        	<?php $no=0;
		                                        	foreach ($pk->result() as $key) { 
		                                        		$no++;
		                                        	?>
		                                        	<tr>
		                                        		<td><?= $key->nama ?></td>
		                                        		<td>Rp. <?= rupiah($key->harga) ?></a></td>
		                                        	</tr>
			                                        <?php } ?>
		                                        </tbody>
		                                    </table>
		                                </div>
		                                <hr style="margin-top: 0">
										<div class="pull-right">
											<a href="<?= site_url('admin/paket') ?>">Selengkapnya..</a>
										</div>
		                            </div>
		                        </div>
							</div>
						</div>

					
                    <div class="page-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>