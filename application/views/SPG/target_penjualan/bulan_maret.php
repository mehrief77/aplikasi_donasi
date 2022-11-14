<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Target Penjualan SPG <?= $this->session->userdata('username'); ?> Di Bulan Maret</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Target Penjualan</a></li>
                        <li class="breadcrumb-item active">Data Target Penjualan</li>
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
                                Week 1 Bulan Maret
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url() ?>targetMaret/add_penjualan" class="btn btn-sm btn-primary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Tambah Data Penjualan
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
                                <th>Nama Barang</th>
                                <th>Terjual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($target_week1 as $a) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a->nama_barang ?></td>
                                    <td><?= $a->harga_penjualan ?></td>
                                    <td>
                                        <a href="<?= base_url('targetMaret/edit_penjualan/') . $a->id ?>" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('targetMaret/delete/') . $a->id ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                                Week 2 Bulan Maret
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url() ?>targetMaret/add_penjualan2" class="btn btn-sm btn-primary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Tambah Data Penjualan
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
                                <th>Nama Barang</th>
                                <th>Terjual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($target_week2 as $a) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a->nama_barang ?></td>
                                    <td><?= $a->harga_penjualan ?></td>
                                    <td>
                                        <a href="<?= base_url('targetMaret/edit_penjualan2/') . $a->id ?>" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('targetMaret/delete/') . $a->id ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Week 3 Bulan Maret
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url() ?>targetMaret/add_penjualan3" class="btn btn-sm btn-primary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Tambah Data Penjualan
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
                                <th>Nama Barang</th>
                                <th>Terjual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($target_week3 as $a) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a->nama_barang ?></td>
                                    <td><?= $a->harga_penjualan ?></td>
                                    <td>
                                        <a href="<?= base_url('targetMaret/edit_penjualan3/') . $a->id ?>" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('targetMaret/delete/') . $a->id ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                                Week 4 Bulan Maret
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url() ?>targetMaret/add_penjualan4" class="btn btn-sm btn-primary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Tambah Data Penjualan
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
                                <th>Nama Barang</th>
                                <th>Terjual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($target_week4 as $a) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a->nama_barang ?></td>
                                    <td><?= $a->harga_penjualan ?></td>
                                    <td>
                                        <a href="<?= base_url('targetMaret/edit_penjualan4/') . $a->id ?>" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('targetMaret/delete/') . $a->id ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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