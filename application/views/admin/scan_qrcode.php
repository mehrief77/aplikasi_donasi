<div class="content-wrapper">

    <!-- Scan QRCode -->
    <link href="<?= base_url() ?>assets/webcodecamjs/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/webcodecamjs/css/style.css" rel="stylesheet">

    <!-- Page Heading -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?= $this->session->flashdata('message'); ?>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-bottom-primary">
                    <div class="card-header bg-white py-3">
                        <div class="row">
                            <div class="col">
                            </div>
                        </div>
                    </div>
                    <div class="container" id="QR-Code">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="navbar-form navbar-left">
                                    <h4>Silahkan Scan</h4>
                                </div>
                                <div class="navbar-form navbar-right">
                                    <select class="form-control" id="camera-select"></select>
                                    <div class="form-group">
                                        <input id="image-url" type="text" class="form-control" placeholder="Image url">
                                        <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                                        <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                                        <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                                        <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                                        <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body text-center">
                                <div class="col-md-6">
                                    <div class="well" style="position: relative;display: inline-block;">
                                        <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                                        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="thumbnail" id="result">
                                        <div class="well" style="overflow: hidden;">
                                            <img width="320" height="240" id="scanned-img" src="">
                                        </div>
                                        <div class="caption">
                                            <h3>Scanned result</h3>
                                            <p id="scanned-QR"></p>
                                        </div>
                                    </div>
                                    <button onclick="myFunction()" click class="btn btn-primary mb-3">Input Donasi</button>
                                    <div class="row" id="formInput" style="display: none;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <form method="POST" action="<?php echo base_url() . 'operator/Dashboard_admin/tambah_donasi' ?>">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email Donatur</label>
                                                    <!-- <input type="hidden" name="id_admin" value="<?= $this->session->userdata('id_adm'); ?>"> -->
                                                    <input type="text" class="form-control" id="dataqr" name="email_donatur">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Jumlah Donasi (Rp.)</label>
                                                    <input type="number" class="form-control" name="jumlah_donasi">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tanggal Donasi</label>
                                                    <input type="date" class="form-control" name="tgl_donasi">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Proses</button>
                                            </form>
                                        </div>
                                        <div class="col-md-2"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>


</div>

<script>
    function myFunction() {
        var qrcode = document.getElementById('scanned-QR').innerHTML;
        var result = qrcode.slice(9);
        var formInput = document.getElementById("formInput");
        $("#formInput").css("display", "block");

        document.getElementById("dataqr").value = result;
    }
</script>