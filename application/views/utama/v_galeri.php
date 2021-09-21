	<section class=" flex-c-m p-t-80 p-b-50" style="background-color:black"></section>


	<div class="title-review t-center mt-5">
        <span class="tit2 p-l-15 p-r-15">
            Daftar
        </span>
        <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
            Galeri
        </h3>
        <img src="<?= base_url('assets/front-end/') ?>img/icon/xti.png.pagespeed.ic.Ce5j9u3J8A.png" alt="">
    </div>

	<div class="section-gallery p-t-50 p-b-100">
		<div class="container">
			<div class="row">
				<?php foreach($galeri->result() as $key) {?>
				<div class="col-md-4 isotope-item bo-rad-10 hov-img-zoom m-b-50 animated animatedFadeInUp fadeInUp">
					<img src="<?= base_url('assets/images/galeri/'.$key->gambar) ?>" alt="IMG-GALLERY">
					<div class="overlay-item-gallery trans-0-4 flex-c-m">
						<a class="btn-show-gallery flex-c-m" href="<?= base_url('assets/images/galeri/'.$key->gambar) ?>" data-lightbox="gallery"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<?php } ?>
				<!-- <div class="col-md-4 isotope-item bo-rad-10 hov-img-zoom">
					<img src="<?= base_url('assets/front-end/') ?>images/photo-gallery-13.jpg" alt="IMG-GALLERY">
					<div class="overlay-item-gallery trans-0-4 flex-c-m">
						<a class="btn-show-gallery flex-c-m" href="<?= base_url('assets/front-end/') ?>images/photo-gallery-13.jpg" data-lightbox="gallery"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="col-md-4 isotope-item bo-rad-10 hov-img-zoom">
					<img src="<?= base_url('assets/front-end/') ?>images/photo-gallery-13.jpg" alt="IMG-GALLERY">
					<div class="overlay-item-gallery trans-0-4 flex-c-m">
						<a class="btn-show-gallery flex-c-m" href="<?= base_url('assets/front-end/') ?>images/photo-gallery-13.jpg" data-lightbox="gallery"><i class="fa fa-search"></i></a>
					</div>
				</div> -->
			</div>
		</div>
		
		<div class="pagination flex-c-m flex-w p-l-15 p-r-15 m-t-24 m-b-50">
			<?php echo $halaman; ?> <!--Memanggil variable pagination-->
			<!-- <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
			<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
			<a href="#" class="item-pagination flex-c-m trans-0-4">3</a> -->
		</div>
	</div>