<!-- <div class="container-fluid"> -->
<div class="content-wrapper">

    <div class="card">
        <h5 class="card-header">Detail Admin</h5>
        <div class="card-body">

            <?php foreach ($admin as $adm) : ?>
                <div class="row">

                    <div class="col-md-4">
                        <img src="<?php echo base_url() . '/uploads/' . $adm->gambar ?>" class="img-thumbnail">
                    </div>

                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>NO</td>
                                <td><strong><?php echo $adm->id_adm ?></strong></td>
                            </tr>

                            <tr>
                                <td>NAMA</td>
                                <td><strong><?php echo $adm->nama ?></strong></td>
                            </tr>

                            <tr>
                                <td>EMAIL</td>
                                <td><strong><?php echo $adm->email ?></strong></td>
                            </tr>

                            <tr>
                                <td>ALAMAT</td>
                                <td><strong><?php echo $adm->alamat ?></strong></td>
                            </tr>

                            <tr>
                                <td>NO WHATSAPP</td>
                                <td><strong><?php echo $adm->no_wa ?></strong></td>
                            </tr>

                            <tr>
                                <td>PASSWORD</td>
                                <td><strong><?php echo $adm->password ?></strong></td>
                            </tr>

                        </table>

                        <?php echo anchor('operator/Dashboard_admin/data_admin', '<div class="btn btn-primary btn-sm">Kembali</div>') ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>