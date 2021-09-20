<div class="main_slider" >
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" >                
                     <picture>
                      <img src="<?= base_url('assets/front-end/images/header/bn0.jpg') ?>" alt="banner" class="d-block img-fluid">
                    </picture>
                    <div class="carousel-caption">
                        <div align="center" class="ccontent">
                            <h2>Toko Bangunan</h2>
                            <p>Percayakan semua kebutuhan material anda pada kami</p>
                            <a href="#barang" class="btn red_button2" style="width: 200px;">Belanja Sekarang</a>
                        </div>
                    </div>                
            </div>
            <!-- /.carousel-item -->
            <div class="carousel-item">                
                     <picture>
                      <img src="<?= base_url('assets/front-end/images/header/bn1.jpg') ?>" alt="banner" class="d-block img-fluid">
                    </picture>
                    <div class="carousel-caption justify-content-center align-items-center">
                        <div align="center" class="ccontent">
                            <h2>Daftarkan Diri Anda</h2>
                            <p>Login atau daftarkan diri anda untuk dapat berbelanja</p>
                            <button href="javascript:void(0)" onclick="login()" class="btn btn-warning" style="width: 150px;">Login</button>
                            <button href="javascript:void(0)" onclick="daftar()" class="btn red_button2" style="width: 150px;">Daftar</button>
                        </div>
                    </div>                
            </div>
            <!-- /.carousel-item -->
            <div class="carousel-item">                
                     <picture>
                      <img src="<?= base_url('assets/front-end/images/header/bn2.jpg') ?>" alt="banner" class="d-block img-fluid">
                    </picture>
                    <div class="carousel-caption justify-content-center align-items-center">
                        <div align="center"  class="ccontent">
                            <h2>Toko Bangunan</h2>
                            <p>Barang kami Terpecaya, Aman, Kuat dan Tahan Lama</p>
                            <!-- <span class="btn btn-sm btn-secondary">Learn How</span> -->
                        </div>
                    </div>                
            </div>
            <!-- /.carousel-item -->
        </div>
        <!-- /.carousel-inner -->
        <!-- <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->
    </div>
    <!-- /.carousel -->
</div>
<hr>

<!-- Barang -->
	<div class="new_arrivals" id="barang">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Daftar Barang</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid wow fadeInUp" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
						<!-- Product -->
						<?php foreach ($barang->result() as $key) { ?>
							<?php foreach ($satuan->result() as $key1){
							 if ($key1->id_satuan==$key->id_satuan){ ?>
						<div class="product-item">
							<?php $attributes = array('class' => 'form-item'); ?>
                            <?= form_open('', $attributes); ?>
							<div class="product discount product_filter" style="padding: 10px">
								<input type="hidden" name="id_barang" value="<?= $key->id_barang; ?>">
								<div class="product_image" align="center">
									<a href="<?= site_url('i/detail/'.$key->slug) ?>"><img src="<?= base_url('assets/back-end/images/produk/'.$key->gambar) ?>" alt="gambar"></a>
								</div>
								<!-- <div class="favorite"></div> -->
								<div class="product_info">
									<h6 class="product_name"><a href="<?= site_url('i/detail/'.$key->slug) ?>"><?= $key->nama_barang ?></a></h6>
									<div class="product_price">Rp. <?= rupiah($key->harga_barang); ?>,- <span>/ <?= $key1->satuan ?></span></div>
								</div>
							</div>
							<button class="red_button add_to_cart_button" type="submit" style="border: 0;color: #fff">Tambah Keranjang</button>
							<!-- <div class="red_button add_to_cart_button"><a href="javascript:void(0)" onclick="tambah()">Tambah Keranjang</a></div> -->
							<?= form_close(); ?> 
						</div>
						<?php } }}?>
					</div>
					<hr>
					<div class="text-center">
			        <div class="pagination modal-2">
			            <?php echo $halaman; ?> <!--Memanggil variable pagination-->
			        </div>
			        </div>				
				</div>
			</div>
		</div>
	</div>

<!-- pagination -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front-end/styles/style-pagination.css') ?>">

<!-- menu aktif -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      $('.home').addClass('main-active');
  	});

    // script tambah keranjang-belanja
    $(document).ready(function(){
        $(".form-item").submit(function(e){
            var form_data = $(this).serialize();
            var button_content = $(this).find('button[type=submit]');
            button_content.html('Proses...'); //Loading button text

            $.ajax({ //make ajax request to cart_process.php
                url: "<?php echo site_url('i/tambah_keranjang'); ?>",
                type: "POST",
                dataType:"json", //expect json value from server
                data: form_data
            }).done(function(data){ //on Ajax success
                $("#cart-info").html(data.items); //total items in cart-info element
                button_content.html('<i class="glyphicon glyphicon-shopping-cart"></i> Proses'); //reset button text to original text
                alert("Produk sudah dimasukkan kekeranjang belanja anda!"); //alert user
                location.reload();
            })
            e.preventDefault();

        });
    });
</script>