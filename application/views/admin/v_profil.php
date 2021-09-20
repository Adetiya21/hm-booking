<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      $('.profil').addClass('active');
  	});

  	
    function check_int(evt) {
      var charCode = ( evt.which ) ? evt.which : event.keyCode;
      return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
    }

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
                                        <h4>PROFIL</h4>
                                        <span>isi data diri anda.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="<?= site_url('admin/home') ?>"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="<?= site_url('admin/home/profil/'.$this->session->userdata('id')) ?>">Profil</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

				<div class="page-body">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<div class="card">
								<div class="card-header">
									<h5>Data Profil</h5>	
									<div class="card-header-right"> <ul class="list-unstyled card-option"> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li>  <li><i class="feather icon-trash close-card"></i></li> </ul> </div>				
								</div>
								<div class="card-block">
									<!-- <form id="main" method="post" action="https://colorlib.com/" novalidate> -->
									<?= $this->session->flashdata('pesan'); ?>
			                        <?= $this->session->flashdata('error'); ?>
			                        <?= form_open('admin/home/edit_profil'); ?>
			                        
										<div class="form-group row">
											<input type="hidden" class="form-control" value="<?= $profil->id ?>" name="id">
											<label class="col-sm-2 col-form-label">Nama</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" value="<?= $profil->nama ?>" name="nama">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Username</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" value="<?= $profil->username ?>" name="username">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Password</label>
											<div class="col-sm-10">
												<input type="password" class="form-control" name="password">
											</div>
										</div>
										<hr>
										<div class="form-group row">
											<!-- <label class="col-sm-2"></label> -->
											<div class="col-sm-2">
												<button class="btn btn-primary m-b-0 btn-round" style="color: #fff"><i class="fa fa-edit"></i> Edit Data</abutton>
											</div>
										</div>
									<!-- </form> -->
									<?= form_close(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>