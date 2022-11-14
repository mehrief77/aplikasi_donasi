<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Absensi <?= $this->session->userdata('username'); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Absensi</a></li>
                        <li class="breadcrumb-item active">Data Absensi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?= $this->session->flashdata('message'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-6">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Data Absensi Bulan Februari
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url() ?>pageSPG/add_absen" class="btn btn-sm btn-primary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Tambah Absensi
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama SPG</th>
                                <th>Week 1</th>
                                <th>Week 2</th>
                                <th>Week 3</th>
                                <th>Week 4</th>
                                <th>Total Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($absensi_februari as $a) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= $a->w1 ?></td>
                                    <td><?= $a->w2 ?></td>
                                    <td><?= $a->w3 ?></td>
                                    <td><?= $a->w4 ?></td>
                                    <td><?= $a->total ?></td>
                                    <td>
                                        <a href="<?= base_url('pageSPG/edit_absen/') . $a->id ?>" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('pageSPG/delete/') . $a->id ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Data Absensi Bulan Maret
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url() ?>pageSPG/add_absen2" class="btn btn-sm btn-primary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Tambah Absensi
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama SPG</th>
                                <th>Week 1</th>
                                <th>Week 2</th>
                                <th>Week 3</th>
                                <th>Week 4</th>
                                <th>Total Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($absensi_maret as $a) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= $a->w1 ?></td>
                                    <td><?= $a->w2 ?></td>
                                    <td><?= $a->w3 ?></td>
                                    <td><?= $a->w4 ?></td>
                                    <td><?= $a->total ?></td>
                                    <td>
                                        <a href="<?= base_url('pageSPG/edit_absen2/') . $a->id ?>" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('pageSPG/delete2/') . $a->id ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Data Absensi Bulan April
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url() ?>pageSPG/add_absen3" class="btn btn-sm btn-primary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Tambah Absensi
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama SPG</th>
                                <th>Week 1</th>
                                <th>Week 2</th>
                                <th>Week 3</th>
                                <th>Week 4</th>
                                <th>Total Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($absensi_april as $a) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a->nama ?></td>
                                    <td><?= $a->w1 ?></td>
                                    <td><?= $a->w2 ?></td>
                                    <td><?= $a->w3 ?></td>
                                    <td><?= $a->w4 ?></td>
                                    <td><?= $a->total ?></td>
                                    <td>
                                        <a href="<?= base_url('pageSPG/edit_absen3/') . $a->id ?>" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('pageSPG/delete3/') . $a->id ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>