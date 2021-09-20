<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php 
  if ($this->session->userdata('admin_logged_in') == 'Sudah_Loggin'){
    redirect('admin/home','refresh');
  }
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>Login Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="#">
  <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
  <meta name="author" content="#">

  <link rel="icon" href="<?= base_url('assets/back-end')?>/files/assets/images/favicon.ico" type="image/x-icon">
  <link href="<?= base_url('assets/back-end/') ?>fonts.googleapis.com/css3b0a.css?family=Open+Sans:400,600,800" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/back-end')?>/files/bower_components/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/back-end')?>/files/assets/icon/themify-icons/themify-icons.css">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/back-end')?>/files/assets/icon/icofont/css/icofont.css">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/back-end')?>/files/assets/css/style.css">

  <?=  $this->recaptcha->getScriptTag(); ?>
</head>
<body class="fix-menu">

    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>

    <section class="login-block">

        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <?= form_open('admin/welcome/login'); ?>
                        <div class="text-center">
                            <img src="<?= base_url('assets/back-end')?>/files/assets/images/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Login Admin</h3>                    
                                    </div>
                                </div>
                                <?= $this->session->flashdata('pesan'); ?>
                                <?= $this->session->flashdata('error'); ?>
                                <div class="form-group form-primary">
                                    <input type="text" name="username" class="form-control" required="" placeholder="Username">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required="" placeholder="Password">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <?= $this->recaptcha->getWidget() ?>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?= form_close(); ?>

                </div>

            </div>

        </div>

    </section>


    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/bower_components/modernizr/js/css-scrollbars.js"></script>

    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/back-end')?>/files/assets/js/common-pages.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="text/javascript"></script>
    <script type="text/javascript">
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
  </script>
  <script src="<?= base_url('assets/back-end/') ?>ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="c75cec29b4250abb73bbb470-|49" defer=""></script></body>

  <!-- Mirrored from colorlib.com//polygon/adminty/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jun 2020 15:43:59 GMT -->
  </html>
