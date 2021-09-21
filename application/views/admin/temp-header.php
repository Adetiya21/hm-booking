<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>Admin | <?= $title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="#">
  <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
  <meta name="author" content="#">
  <link rel="icon" href="<?=base_url('assets/back-end') ?>/files/assets/images/favicon.ico" type="image/x-icon">
  <link href="<?= base_url('assets/back-end/') ?>fonts.googleapis.com/css3b0a.css?family=Open+Sans:400,600,800" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/bower_components/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/assets/icon/themify-icons/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/assets/icon/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/assets/icon/icofont/css/icofont.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/assets/icon/feather/css/feather.css">

  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/assets/pages/data-table/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/bower_components/select2/css/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/assets/css/linearicons.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back-end') ?>/files/assets/css/jquery.mCustomScrollbar.css">

</head>
<body>

<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="index.html">
                        <img class="img-fluid" src="<?=base_url('assets/back-end/files/assets/images/logo.png') ?>" alt="Theme-Logo" />
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <a href="#!" onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()" data-cf-modified-107119fdf252e45e83d23571-="">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?=base_url('assets/back-end/files/assets/images/user.jpg') ?>" class="img-radius" alt="User-Profile-Image">
                                    <span><?php echo $this->session->userdata('nama')?></span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="<?= site_url('admin/home/profil/'.$this->session->userdata('id')) ?>">
                                            <i class="feather icon-user"></i> Profil
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('logout') ?>">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="pcoded-navigatio-lavel">Navigation</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="home">
                                <a href="<?= site_url('admin/home') ?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                    <span class="pcoded-mtext">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                        <hr>

                        <ul class="pcoded-item pcoded-left-item">                               
                            <li class="admin">
                                <a href="<?= site_url('admin/admin') ?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-command"></i>
                                    </span>
                                    <span class="pcoded-mtext">Admin</span>
                                </a>
                            </li>
                        </ul>

                        <ul class="pcoded-item pcoded-left-item">                               
                            <li class="tentang">
                                <a href="<?= site_url('admin/tentang') ?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-briefcase"></i>
                                    </span>
                                    <span class="pcoded-mtext">Tentang Web</span>
                                </a>
                            </li>
                        </ul>

                        <ul class="pcoded-item pcoded-left-item">
                            <li class="header pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-image"></i>
                                    </span>
                                    <span class="pcoded-mtext">Gambar</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="landscape">
                                        <a href="<?= site_url('admin/header-landscape') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Header Landscape</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- <ul class="pcoded-submenu">
                                    <li class="potrait">
                                        <a href="<?= site_url('admin/header-portrait') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Header Portrait</span>
                                        </a>
                                    </li>
                                </ul> -->
                                <ul class="pcoded-submenu">
                                    <li class="galeri">
                                        <a href="<?= site_url('admin/galeri') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Galeri</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="pcoded-item pcoded-left-item">                               
                            <li class="paket">
                                <a href="<?= site_url('admin/paket') ?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-layers"></i>
                                    </span>
                                    <span class="pcoded-mtext">Data Paket</span>
                                </a>
                            </li>
                        </ul>

                        <ul class="pcoded-item pcoded-left-item">                               
                            <li class="booking">
                                <a href="<?= site_url('admin/booking') ?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-clipboard"></i>
                                    </span>
                                    <span class="pcoded-mtext">Data Booking</span>
                                </a>
                            </li>
                        </ul>

                        <ul class="pcoded-item pcoded-left-item">
                            <li class="laporan pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-book"></i>
                                    </span>
                                    <span class="pcoded-mtext">Laporan</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="semua">
                                        <a href="<?= site_url('admin/laporan') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Semua</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-submenu">
                                    <li class="selesai">
                                        <a href="<?= site_url('admin/laporan-selesai') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Status Selesai</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-submenu">
                                    <li class="belum">
                                        <a href="<?= site_url('admin/laporan-belum-selesai') ?>" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Status Belum Selesai</span>
                                        </a>
                                    </li>
                                </ul>
                                
                            </li>
                        </ul>
                        
                        <hr>
                        <div class="pcoded-navigation-label" style="margin-top: 150px; text-align: center;color: #f0f0f0; font-size: 0.9em;">Copyright© 2021<br>Allrights Reserved.</div>
                    </div>
                </nav>