<!DOCTYPE html>

<!-- <body style="background-color: red;"> -->

<body class="bodi">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/stile_o.css'); ?>">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Buat Akun </h1>
                                        <h1 class="h4 text-gray-900 mb-4">Donatur Donasi</h1>
                                        <!-- <img class="mb-2" src="<?php echo base_url() ?>uploads/logo_indomart.PNG"> -->
                                    </div>

                                    <?php echo $this->session->flashdata('pesan') ?>

                                    <form class="user" method="post" action="<?= base_url('Auth/registration'); ?>" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="<?= set_value('nama'); ?>" required>
                                            <!-- membuat kode tulisan error pada nama  di register-->
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?= set_value('email'); ?>" required>
                                            <!-- membuat kode tulisan error pada no_telp di register -->
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="5" id="alamat" name="alamat" rows="3" placeholder=""><?= set_value('alamat'); ?></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>No Wa</label>
                                            <input type="text" class="form-control" id="no_wa" name="no_wa" placeholder="" value="<?= set_value('no_wa'); ?>" required>
                                            <!-- membuat kode tulisan error pada no_telp di register -->
                                            <?= form_error('no_wa', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password" required>
                                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Full Name">
                                            <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Mari Buat Akun
                                        </button>

                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/login'); ?>">Sudah Punya Akun? Langsung Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    </html>