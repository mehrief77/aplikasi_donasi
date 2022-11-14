<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Survei Kepuasan Pelanggan</title>
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
                <li class="nav-item"> <a style="color: white;" class="nav-link">Selamat Datang, <?= $this->session->userdata('username'); ?></a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <aside class="main-sidebar sidebar-light-danger elevation-4">
            <!-- Brand Logo -->
            <a style="color: white;" href="#" class="brand-link navbar-danger">
                <!-- <img src="<?php echo base_url() ?>assets/dist/img/logo_r.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <img src="<?php echo base_url() ?>uploads/logo_indomart.PNG" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light" style="font-size: 17px;">Survei Kepuasan Pelanggan</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Admin/grafik') ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a class="nav-link active" href="">
                                <img src="<?= base_url('uploads/bar-chart.png'); ?> " width="30px">
                                <p>HASIL BIDANG</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('grafik/Pelayanan') ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>PELAYANAN</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('grafik/Kebersihan') ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>KEBERSIHAN</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('grafik/Stock') ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>KETERSEDIAAN PRODUK</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('grafik/Harga') ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>HARGA</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Admin/pengguna') ?>">
                                <img src="<?= base_url('uploads/programmer.png'); ?> " width="30px">
                                <p>Pengguna</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Admin/cabang') ?>">
                                <img src="<?= base_url('uploads/shop.png'); ?> " width="30px">
                                <p>Nama Cabang</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Admin/bidang') ?>">
                                <img src="<?= base_url('uploads/menu.png'); ?> " width="30px">
                                <p>Halaman Bidang</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Admin/List_pertanyaan/') ?>">
                                <img src="<?= base_url('uploads/question-mark.png'); ?> " width="30px">
                                <p>Halaman List Pertanyaan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Admin/pertanyaan/') ?>">
                                <img src="<?= base_url('uploads/problem.png'); ?> " width="30px">
                                <p>Halaman Pertanyaan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Admin/result/') ?>">
                                <img src="<?= base_url('uploads/results.png'); ?> " width="30px">
                                <p>Result</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Admin/review/') ?>">
                                <img src="<?= base_url('uploads/reviews.png'); ?> " width="30px">
                                <p>Review</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?= base_url()   ?>auth/logout" class="nav-link">
                                <img src="<?= base_url('uploads/logout.png'); ?> " width="30px">
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
            <!-- <?= $this->session->flashdata('message'); ?> -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card-header bg-white py-3">
                            <h4 class="h5 align-middle m-0 font-weight-bold">
                                Grafik Kepuasan Pelanggan Bidang Kebersihan
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
                            <!-- <div id="barChart2">

                            </div> -->
                            <!-- <div class="card">
                                <p>Kesimpulan dari PIC bahwa SPG bernama Rosita Tidak Mencapai Target Penjualan Dalam Waktu 3 Bulan</p>
                            </div> -->
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
        // Highcharts.chart('barChart', {
        //     chart: {
        //         plotBackgroundColor: null,
        //         plotBorderWidth: null,
        //         plotShadow: false,
        //         type: 'pie'
        //     },
        //     title: {
        //         text: 'Survei Kepuasan Pelanggan'
        //     },
        //     tooltip: {
        //         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        //     },
        //     accessibility: {
        //         point: {
        //             valueSuffix: '%'
        //         }
        //     },
        //     plotOptions: {
        //         pie: {
        //             allowPointSelect: true,
        //             cursor: 'pointer',
        //             dataLabels: {
        //                 enabled: true,
        //                 format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        //             }
        //         }
        //     },
        //     series: [{
        //         name: 'Kepuasan',
        //         colorByPoint: true,
        //         data: [{
        //                 name: <?= json_encode($kepuasan[0]); ?>,
        //                 y: <?= json_encode($total_sp) ?>,
        //             },
        //             {
        //                 name: <?= json_encode($kepuasan[1]); ?>,
        //                 y: <?= json_encode($total_p) ?>,
        //             },
        //             {
        //                 name: <?= json_encode($kepuasan[2]); ?>,
        //                 y: <?= json_encode($total_cp) ?>,
        //             },
        //             {
        //                 name: <?= json_encode($kepuasan[3]); ?>,
        //                 y: <?= json_encode($total_kp) ?>,
        //             },
        //             {
        //                 name: <?= json_encode($kepuasan[4]); ?>,
        //                 y: <?= json_encode($total_tp) ?>,
        //             }
        //         ]
        //     }]
        // });

        Highcharts.chart('barChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Kepuasan Pelanggan Bidang Kebersihan'
            },
            subtitle: {
                text: ''
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                },
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total Survei Kepuasan Pelanggan'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}</b> of total<br/>'
            },

            series: [{
                name: "Kepuasan Pelanggan",
                colorByPoint: true,
                data: [{
                        name: <?= json_encode($kepuasan[0]); ?>,
                        y: <?= json_encode($total_sp) ?>,
                        drilldown: <?= json_encode($kepuasan[0]); ?>,
                    },
                    {
                        name: <?= json_encode($kepuasan[1]); ?>,
                        y: <?= json_encode($total_p) ?>,
                        drilldown: <?= json_encode($kepuasan[1]); ?>,
                    },
                    {
                        name: <?= json_encode($kepuasan[2]); ?>,
                        y: <?= json_encode($total_cp) ?>,
                        drilldown: <?= json_encode($kepuasan[2]); ?>,
                    },
                    {
                        name: <?= json_encode($kepuasan[3]); ?>,
                        y: <?= json_encode($total_kp) ?>,
                        drilldown: <?= json_encode($kepuasan[3]); ?>,
                    },
                    {
                        name: <?= json_encode($kepuasan[4]); ?>,
                        y: <?= json_encode($total_tp) ?>,
                        drilldown: <?= json_encode($kepuasan[4]); ?>,
                    }
                ]
            }],
        });
    </script>