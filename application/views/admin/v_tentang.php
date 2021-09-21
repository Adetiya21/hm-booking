<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	// menu aktif
    $(document).ready(function() {
      $('.tentang').addClass('active');
  	});

  	// fun numerik no telp
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
                                        <h4>TENTANG WEB</h4>
                                        <span>Berikut data infomasi tentang website.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="<?= site_url('admin/home') ?>"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="<?= site_url('admin/tentang') ?>">Tentang Web</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="page-body">
                        <div class="card">
                            <div class="card-header">
                                <h5>Data Informasi Web</h5>
                                <span><!-- use class <code>table</code> inside table element --></span>
                                <div class="card-header-right"> <ul class="list-unstyled card-option"> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i><li><i class="feather icon-trash close-card"></i></li></ul> </div>
                            </div>
							<div class="card-block">
								<?= $this->session->flashdata('pesan'); ?>
		                        <?= $this->session->flashdata('error'); ?>
		                        <?php $arb = array('enctype' => "multipart/form-data", );?>
		                        <?= form_open('admin/tentang/proses',$arb); ?>
		                        	<input type="hidden" value="<?= $tentang->id ?>" name="id">
		                        	<div class="form-group row">
										<label class="col-sm-2 col-form-label">Nama</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" value="<?= $tentang->nama ?>" name="nama" placeholder="Masukkan Nama">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Tagline</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" value="<?= $tentang->tagline ?>" name="tagline" placeholder="Masukkan Tagline">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Logo</label>
										<div class="col-sm-10">
											<input id="uploadImage" class="form-control" type="file" name="logo" onchange="PreviewImage();" value="<?= $tentang->logo ?>" />
											<p class="help-block">PNG, JPG, JPEG - Max. 2MB </p>
							                <div class="form-group" id="photo-preview"></div>
							                <img id="uploadPreview" style="max-width:300px; height:150px; border-radius: 10px; box-shadow: 0px 0px 3px 0px;" src="<?= base_url('assets/images/logo/') ?><?= $tentang->logo ?>" />
							            </div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Deskripsi</label>
										<div class="col-sm-10">
											<textarea class="form-control" name="tentang" rows="3" id="editor1"><?= $tentang->tentang ?></textarea>
										</div>
									</div>
									<br>
									<h5>Kontak</h5>
									<hr>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">No Telp</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" value="<?= $tentang->no_telp ?>" name="no_telp" maxlength="14" onkeypress='return check_int(event)'>
										</div>
									</div>
									<!-- <div class="form-group row">
										<label class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" value="<?= $tentang->email ?>" name="email" placeholder="Masukkan Link Sosmed/Instagram/Twitter">
										</div>
									</div> -->
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Instagram</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" value="<?= $tentang->ig ?>" name="ig" placeholder="Masukkan Username Instagram">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Facebook</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" value="<?= $tentang->fb ?>" name="fb" placeholder="Masukkan Nama User Facebook">
										</div>
									</div>
				                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Alamat</label>
										<div class="col-sm-10">
											<textarea class="form-control" name="alamat" rows="4"><?= $tentang->alamat ?></textarea>
										</div>
									</div>
									<!-- <div class="form-group row">
										<label class="col-sm-2 col-form-label">Iframe Maps</label>
										<div class="col-sm-10">
											<textarea class="form-control" name="iframe" rows="7" placeholder="Masukkan Link Iframe Maps Google"><?= $tentang->iframe ?></textarea>
										</div>
									</div> -->
									<hr>
									<div class="form-group row">
										<div class="col-sm-2">
											<button class="btn btn-primary m-b-0 btn-round" style="color: #fff"><i class="fa fa-edit"></i> Simpan Perubahan</abutton>
										</div>
									</div>
								<?= form_close(); ?>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- ckeditor -->
<script src="<?= base_url('assets/back-end/files/') ?>ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>