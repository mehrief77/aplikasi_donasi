<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Kinerja Cabang</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="sidebar-mini layout-fixed accent-danger" style="height: auto;">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item"> <a style="color: white;" class="nav-link">Selamat Datang, PIC <?= $this->session->userdata('username'); ?></a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <aside class="main-sidebar sidebar-light-danger elevation-4">
            <!-- Brand Logo -->
            <a style="color: white;" href="#" class="brand-link navbar-danger">
                <img src="<?php echo base_url() ?>assets/dist/img/logo_r.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light" style="font-size: 17px;">Sistem Kinerja Cabang</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('pagePIC/index') ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a class="nav-link active" href="">
                                <i class="nav-icon fas fa-mail-bulk"></i>
                                <p>Report SPG Penjualan</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>pagePIC/rekap_februari" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bulan Februari</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>pagePIC/rekap_maret" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bulan Maret</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>pagePIC/rekap_april" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bulan April</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a class="nav-link active" href="">
                                <i class="nav-icon fas fa-mail-bulk"></i>
                                <p>Absensi SPG</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>pagePIC/absensi_februari" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bulan Februari</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>pagePIC/absensi_maret" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bulan Maret</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>pagePIC/absensi_april" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bulan April</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url()   ?>auth/logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <!-- <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Absensi <?= $this->session->userdata('username'); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Absensi</a></li>
                        <li class="breadcrumb-item active">Data Absensi</li>
                    </ol>
                </div>
            </div> -->
                </div><!-- /.container-fluid -->
            </section>
            <?= $this->session->flashdata('message'); ?>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card-header bg-white py-3">
                            <h4 class="h5 align-middle m-0 font-weight-bold">
                                Target Penjualan SPG
                                <ol>
                                    <li>Target Penjualan Di Bulan Februari : 160.000.000</li>
                                    <li>Target Penjualan Di Bulan Maret : 165.000.000</li>
                                    <li>Target Penjualan Di Bulan April : 170.000.000</li>
                                </ol>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-body bg-white py-3">
                            <div id="barChart">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-body bg-white py-3">
                            <div id="barChart2">

                            </div>
                            <div class="card">
                                <p>Kesimpulan dari PIC bahwa SPG bernama Rosita Tidak Mencapai Target Penjualan Dalam Waktu 3 Bulan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->

        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/highcharts.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

    <script type="text/javascript">
        Highcharts.chart('barChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Monitoring Cabang'
            },
            subtitle: {
                text: 'Februari s/d April'
            },
            xAxis: {
                categories: ["Janah", "Regita", "Rosita"],
                crosshair: true
            },
            yAxis: {
                min: 0,
                max: 200000000,
                title: {
                    text: 'Penjualan'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} penjualan</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    // dataLabels: {
                    //     enabled: true
                    // },
                    pointPadding: 0.2,
                    borderWidth: 0
                }

            },
            series: [{
                name: <?= json_encode($bulan[0]); ?>,
                data: <?= json_encode($janah) ?>,
            }, {
                name: <?= json_encode($bulan[1]); ?>,
                data: <?= json_encode($regita) ?>,
            }, {
                name: <?= json_encode($bulan[2]); ?>,
                data: <?= json_encode($rosita) ?>,
            }]
        });

        Highcharts.chart('barChart2', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Monitoring Total Penjualan SPG Selama 3 Bulan'
            },
            subtitle: {
                text: 'Februari s/d April'
            },
            xAxis: {
                categories: ["Total Penjualan SPG"],
                crosshair: true
            },
            yAxis: {
                min: 0,
                max: 550000000,
                title: {
                    text: 'Penjualan'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} penjualan</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    // dataLabels: {
                    //     enabled: true
                    // },
                    pointPadding: 0.2,
                    borderWidth: 0
                }

            },
            series: [{
                name: <?= json_encode($spg[0]); ?>,
                data: <?= json_encode($totaljanah) ?>,
            }, {
                name: <?= json_encode($spg[1]); ?>,
                data: <?= json_encode($totalregita) ?>,
            }, {
                name: <?= json_encode($spg[2]); ?>,
                data: <?= json_encode($totalrosita) ?>,
            }]
        });
    </script>