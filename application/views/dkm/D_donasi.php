<div class="content-wrapper">
    <!-- Page Heading -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Barang Keluar</a></li>
                        <li class="breadcrumb-item active">Data Barang Keluar</li> -->
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
                                <!-- <h4 class="h5 align-middle m-0 font-weight-bold">
                                    
                                </h4> -->
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr class="text-center">
                                <th>NO</th>
                                <th>TANGGAL DONASI</th>
                                <th>EMAIL</th>
                                <th>NOMINAL</th>
                                <th>STATUS DONASI</th>
                                <th>DIPROSES OLEH</th>
                                <th style="text-align:center;" colspan="3">AKSI</th>
                            </tr>

                            <?php
                            $no = 1;
                            foreach ($donasi as $adm) :
                            ?>

                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $adm->tgl_donasi ?></td>
                                    <td><?php echo $adm->email_donatur ?></td>
                                    <td><?= "Rp " . number_format($adm->nominal, 0, '', '.'); ?>
                                    </td>
                                    <td><?php echo $adm->status_donasi ?></td>
                                    <td><?php echo $adm->nama ?></td>
                                    <!-- tombol button -->
                                    <td> <?php echo anchor('dkm/Dashboard_dkm/hapus_donasi/' . $adm->id_donasi, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?> </td>

                                    <td> <?php echo anchor('dkm/Dashboard_dkm/cetak_laporan/' . $adm->id_donasi, '<div class="btn btn-success btn-sm"><i class="fas fa-print"></i></div>') ?> </td>
                                    <!-- <td> <a href="https://api.whatsapp.com/send?phone=+62881024497718&text=test&text=https://www.twilio.com/docs/whatsapp/tutorial/send-and-receive-media-messages-whatsapp-php" data-action="share/whatsapp/share">Share via Whatsapp web</a>
                                    </td> -->
                                    <!-- <td> <?php echo anchor('operator/Dashboard_admin/share_laporan/' . $adm->id_donasi, '<div class="btn btn-primary btn-sm"><i class="fas fa-share-alt-square"></i></div>') ?> </td> -->


                                </tr>

                            <?php endforeach; ?>

                        </table>
                    </div>
                </div>
            </div>
    </section>


</div>