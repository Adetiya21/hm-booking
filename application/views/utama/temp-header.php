<!DOCTYPE html>
<html lang="en">
<head>
<title><?= $title ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- style -->
<link rel="icon" type="image/x-icon" href="<?= base_url('assets/front-end/img/favicon.ico') ?>" />

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front-end/css/') ?>bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front-end/css/') ?>main-style.css">

<link rel="stylesheet" href="<?= base_url('assets/front-end/css/') ?>style.css" type="text/css" />
<!-- Recapcha -->
    <?=  $this->recaptcha->getScriptTag(); ?>
</head>
<body class="animsition">
	<header>
		<div class="wrap-menu-header gradient1 trans-0-4">
			<div class="container h-full">
				<div class="wrap_header trans-0-3">

					<div class="visib-sm logo1">
						<a href="<?= site_url('') ?>">
							<img src="<?= base_url('assets/images/logo/logo.png') ?>" alt="LOGO" class="visib-sm">
						</a>
					</div>
					<div class="hide-sm logo">
						<a href="<?= site_url('') ?>">
							<img src="<?= base_url('assets/images/logo/'.$ten->logo) ?>" alt="LOGO" class="hide-sm">
						</a>
					</div>
					<div class="wrap_menu p-l-45 p-l-0-xl">
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="<?= site_url('') ?>">Home</a>
								</li>
								<li>
									<a href="<?= site_url('home') ?>#paket">Paket</a>
								</li>
								<li>
									<a href="<?= site_url('galeri') ?>">Galeri</a>
								</li>
								<li>
									<a href="<?= site_url('home') ?>#daftarbooking">Daftar Booking</a>
								</li>
								<li>
									<a href="<?= site_url('home') ?>#booking">Booking</a>
								</li>
							</ul>
						</nav>
					</div>

					<div class="social flex-w flex-l-m p-r-20">
						<a href="https://instagram.com/<?= $ten->ig ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="https://facebook.com/<?= $ten->fb ?>" target="_blank"><i class="fa fa-facebook m-l-21" aria-hidden="true"></i></a>
						<a href="https://wa.me/<?= $ten->no_telp ?>" target="_blank"><i class="fa fa-phone m-l-21" aria-hidden="true"></i></a>
						<button class="btn-show-sidebar m-l-33 trans-0-4"></button>
					</div>
				</div>
			</div>
		</div>
	</header>

	<aside class="sidebar trans-0-4">
		<button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>
		<ul class="menu-sidebar p-t-95 p-b-70">
			<li class="t-center m-b-13">
				<a href="<?= site_url('') ?>" class="txt19">Home</a>
			</li>
			<li class="t-center m-b-13">
				<a href="<?= site_url('home') ?>#paket" class="txt19">Paket</a>
			</li>
			<li class="t-center m-b-13">
				<a href="<?= site_url('galeri') ?>" class="txt19">Galeri</a>
			</li>
			<li class="t-center m-b-13">
				<a href="<?= site_url('home') ?>#daftarbooking" class="txt19">Daftar Booking</a>
			</li>
			<li class="t-center">
				<a href="<?= site_url('home') ?>#booking" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
					Booking
				</a>
			</li>
		</ul>
	</aside>
