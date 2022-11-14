<!DOCTYPE html>

<head>
    <title>Laporan Donasi</title>
    <meta charset="utf-8">
    <style>
        #judul {
            text-align: center;
        }

        #ttd {
            display: flex;
            justify-content: space-between;
        }

        #halaman {
            width: auto;
            height: auto;
            position: absolute;
            border: 1px solid;
            padding-top: 10px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }
    </style>

</head>

<body>

    <div id=halaman>
        <?php
        $tanggal = mktime(date("m"), date("d"), date("Y"));
        ?>

        <div style="display: flex; align-items: center; justify-content: center; gap: 20px;">
            <table>
                <img src="<?php echo base_url() ?>assets/images/logo_masjid.png" alt="" height="100px" width="100px">
                <div>
                    <h2 id="judul">DEWAN KEMAKMURAN MASJID</h2>
                    <h2 id="judul">RIYADHUS SHALIHIN</h2>
                    <h3 id="judul">PADURENAN - MUSTIKAJAYA</h3>
                    <h3 id="judul">KOTA BEKASI</h3>
                    <p>Perumahan Mutiara Insani, Rt.06/008 Jl.Kelapa Dua Kel.Padurenan Kec.Mustika jaya - Kota Bekasi</p>
                    <hr>
                    <!-- <h3 id="judul">SURAT KETERANGAN PERMOHONAN SKCK</h3>
                <p id="judul">Nomor:140/10/1/2021</p> -->
                    <p>Kepada para donatur yang terhormat, dengan ini kami menyampaikan hasil laporan keuangan:</p>
                    <table align="center">
                        <?php foreach ($donasi as $d) : ?>
                            <tr>
                                <td style="width: 30%; padding-right:30px;">Tanggal Donasi</td>
                                <td style="width: 5%;">:</td>
                                <td style="width: 65%; padding-left:10px;"><?= $d->tgl_donasi ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;">Email</td>
                                <td style="width: 5%;">:</td>
                                <td style="width: 65%; padding-left:10px;"><?php echo $d->email_donatur ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;">Nominal</td>
                                <td style="width: 5%;">:</td>
                                <td style="width: 65%; padding-left:10px;"><?= "Rp " . number_format($d->nominal, 0, '', '.'); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;">Status Donasi</td>
                                <td style="width: 5%;">:</td>
                                <td style="width: 65%; padding-left:10px;"><?php echo $d->status_donasi ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;">Diproses Oleh</td>
                                <td style="width: 5%;">:</td>
                                <td style="width: 65%; padding-left:10px;"><?php echo $d->nama ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <br>
                    <br>
                    <div id="ttd">
                        <!--Kasih div untuk pembungkus tanda tangan nya-->
                        <div>
                            <!--Kasih div untuk pembungkus bagian tanda tangan pemohon sebelah kiri-->
                            <!-- <div>Tandatangan Pemohon,</div><br><br><br> -->
                            <!--Hapus style nya-->
                            <!-- <div>Dejankun</div> -->
                            <!--Hapus style nya-->
                        </div>
                        <!-- <div style="width: 40%; text-align: left; float: left;">Keterangan :-Putih Untuk Ybs</div><br>
        <div style="width: 40%; text-align: left; float: left;">-Kuning Untuk RT</div><br>
        <div style="width: 40%; text-align: left; float: left;">-Merah Untuk RW</div> -->

                        <div>
                            <!--Kasih div untuk pembungkus bagian jadwal sebelah kanan-->
                            <div style="width: 40%; text-align: left; float: right;">Bekasi, <?php echo date("d-M-Y", $tanggal); ?></div><br>
                            <!--Hapus style nya-->
                            <div style="width: 40%; text-align: left; float: right;">DKM Masjid Riyadhus Shalihin</div><br><br><br>
                            <!--Hapus style nya-->
                            <div style="width: 40%; text-align: left; float: right;"><?php echo $d->nama ?></div>
                            <!--Hapus style nya-->
                        </div>
                    </div>
                </div>
            </table>
        </div>

    </div>

</body>

</html>