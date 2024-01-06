<?php
$url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$tag = array('HM Project',$title.'|  HM Project' ,'Borneo', 'Pontianak', 'Indonesia', 'Foto Wedding','Video Wedding','Wedding Planner','Wedding Photographer','Wedding Organizer','Photography','Videography' ); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="robots" content="all,follow">
<meta name="googlebot" content="index,follow,snippet,archive">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?= $title ?></title>

<meta name="keywords" content="HM Project Team, <?= $title ?> | HM Project Team ,Borneo, Pontianak, Indonesia, Foto Wedding,Video Wedding,Wedding Planner,Wedding Photographer,Wedding Organizer,Photography,Videography"/>
<meta name="description" content="Kami menerima jasa foto video pernikahan untuk daerah Kalimantan Barat terutama untuk kota Sanggau dan Pontianak. Momen pernikahan adalah momen yang harus diabadikan kesuciannya melalui visual gambar ataupun video, percayakan saja ke kami untuk mengabadikan momen kalian. Insyaallah kami akan amanah untuk tugas kami memberikan kepuasan terhadap catin-catin kami.">

<link rel="canonical" href="<?= $url ?>" />
<meta property="og:locale" content="id" />
<meta property="og:type" content="HM Project Team" />
<meta property="og:title" content="<?= $title ?> | HM Project Booking" />
<meta property="og:description" content="
Kami menerima jasa foto video pernikahan untuk daerah Kalimantan Barat terutama untuk kota Sanggau dan Pontianak. Momen pernikahan adalah momen yang harus diabadikan kesuciannya melalui visual gambar ataupun video, percayakan saja ke kami untuk mengabadikan momen kalian. Insyaallah kami akan amanah untuk tugas kami memberikan kepuasan terhadap catin-catin kami. 
" />
<meta property="og:url" content="<?= $url ?>" />
<meta property="og:site_name" content="HM Project Team" />
<meta property="og:image" itemprop="image" content="<?= base_url('assets/images/logo/logo.jpg') ?>">
<meta property="og:type" content="website" />
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">

<meta property="article:publisher" content="hmproject.art" />
<meta property="article:author" content="Admin HM Project Team" />
<?php foreach ($tag as $key): ?>
    <meta property="article:tag" content="<?= $key?>" />  
<?php endforeach ?>
<meta property="article:tag" content="<?= $title ?>" />  
<meta content='Indonesia' name='geo.placename'/>
<meta content='hmproject.art' name='Author'/>
<meta content='Indonesian' name='language'/>
<meta content='general' name='rating'/>
<meta content='global' name='distribution'/>
<meta content='blogger' name='generator'/>
<meta content='aeiwi, alexa, alltheWeb, altavista, aol netfind, anzwers, canada, directhit, euroseek, excite, overture, go, google, hotbot. infomak, kanoodle, lycos, mastersite, national directory, northern light, searchit, simplesearch, Websmostlinked, webtop, what-u-seek, aol, yahoo, webcrawler, infoseek, excite, magellan, looksmart, bing, cnet, googlebot' name='search engines'/>
  
<!-- style -->
<link rel="icon" type="image/x-icon" href="<?= base_url('assets/front-end/img/favicon.ico') ?>" />
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front-end/css/') ?>bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front-end/css/') ?>main-style.css">
<link rel="stylesheet" href="<?= base_url('assets/front-end/css/') ?>style.css" type="text/css" />

<!-- Recapcha -->
<?=  $this->recaptcha->getScriptTag(); ?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y0JFE4ZWKS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Y0JFE4ZWKS');
</script>
<style>
	.modal-dialog-centered {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-align: center;
		align-items: center;
		min-height: calc(100% - 1rem);
	}
</style>
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
									<a href="<?= site_url('home') ?>#paket">Paket 2024</a>
								</li>
								<li>
									<a href="<?= site_url('galeri') ?>">Galeri Foto & Promo</a>
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
				<a href="<?= site_url('home') ?>#paket" class="txt19">Paket 2024</a>
			</li>
			<li class="t-center m-b-13">
				<a href="<?= site_url('galeri') ?>" class="txt19">Galeri Foto</a>
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
