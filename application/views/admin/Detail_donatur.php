<!-- <div class="container-fluid"> -->
<div class="content-wrapper">

    <div class="card">
        <h5 class="card-header">Detail Donatur</h5>
        <div class="card-body">

            <?php foreach ($donatur as $dnt) : ?>
                <div class="row">

                    <div class="col-md-4">
                        <img src="<?php echo base_url() . '/uploads/' . $dnt->gambar ?>" class="img-thumbnail">
                        <img src="<?php echo base_url() . 'assets/images/' . $dnt->qr_code; ?>" class="img-thumbnail">
                    </div>

                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>NO</td>
                                <td><strong><?php echo $dnt->id_dnt ?></strong></td>
                            </tr>

                            <tr>
                                <td>NAMA</td>
                                <td><strong><?php echo $dnt->nama ?></strong></td>
                            </tr>

                            <tr>
                                <td>EMAIL</td>
                                <td><strong><?php echo $dnt->email ?></strong></td>
                            </tr>

                            <tr>
                                <td>ALAMAT</td>
                                <td><strong><?php echo $dnt->alamat ?></strong></td>
                            </tr>

                            <tr>
                                <td>NO WHATSAPP</td>
                                <td><strong><?php echo $dnt->no_wa ?></strong></td>
                            </tr>

                            <tr>
                                <td>PASSWORD</td>
                                <td><strong><?php echo $dnt->password ?></strong></td>
                            </tr>

                        </table>

                        <?php echo anchor('operator/Dashboard_admin/data_donatur', '<div class="btn btn-primary btn-sm">Kembali</div>') ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>