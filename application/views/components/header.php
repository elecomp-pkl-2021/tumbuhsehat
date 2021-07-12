<?php
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('j F Y');
$hari = date('l ');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/theme.min.css">
    <script src="<?= base_url() ?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/c3/c3.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/theme.min.css">
    <script src="<?= base_url() ?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="<?= base_url() ?>assets/js/time.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <button class="btn btn-light"><i class="ik ik-calendar mr-2"></i> <b><?= $hari ?></b>,
                            <?= $tanggal ?></button>
                        <button class="btn btn-light mr-2 ml-2" id="clock"></button>
                        <button class="btn btn-light mr-2"> <i class="ik ik-map-pin mr-2"></i> <b> Escalade Dental -
                                Tebet </b></button>
                        <button class="btn btn-light"> <i class="ik ik-user mr-2"></i> <b>Frontliner</b> </button>
                    </div>
                    <div class="top-menu d-flex align-items-center mr-20">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img class="avatar"
                                    src="<?= base_url('assets') ?>/img/user.png" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>"><i
                                        class="ik ik-power dropdown-icon"></i>
                                    Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="<?= base_url('home') ?>">
                        <!-- <div class="logo-img">
                            <img src="<?= base_url('assets') ?>/src/img/logo-escalade.png" class="header-brand-img" alt="lavalite">
                        </div> -->
                        <span class="text">Tumbuh Sehat</span>
                    </a>
                </div>