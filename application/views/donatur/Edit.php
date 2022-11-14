<!-- Begin Page Content -->
<!-- <div class="container-fluid"> -->
<div class="content-wrapper">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <section class="content">
        <div class="row">
            <div class="col-lg-8">
                <!-- form ada inputan file, kalo mau uplod gambar atributnya harus ada 3 -->
                <?= form_open_multipart('donatur/Dashboard_d/edit'); ?>

                <!-- <div class="form-group row" hidden> -->
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">ID Donatur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_dnt" name="id_dnt" value="<?= $donatur['id_dnt']; ?>" readonly>
                        <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Full name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $donatur['nama']; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <!-- utk text area, tidak usah menggunakan value -->
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" name="alamat" autofocus=""><?= $donatur['alamat']; ?>
                    </textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">No Whatsapp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_wa" name="no_wa" value="<?= $donatur['no_wa']; ?>">
                        <?= form_error('no_wa', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <!--  thumbnail, supaya gambarnya menjadi kecil -->
                                <img src="<?= base_url('uploads/') . $donatur['gambar']; ?>" class="img-thumbnail" width="240px">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                    <label for="gambar" class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $donatur['email']; ?>" readonly>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="password" name="password" value="<?= $tbl_user['password']; ?>">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
                </form>

            </div>

        </div>
    </section>

</div>