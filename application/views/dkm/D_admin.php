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
                            <div class="col-auto">
                                <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_bidang"><i class="fas fa-plus fa-sm"></i> Tambah Data Admin </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr class="text-center">
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>ALAMAT</th>
                                <th>NO WHATSAPP</th>
                                <th>GAMBAR</th>
                                <th colspan="3">AKSI</th>
                            </tr>

                            <?php
                            $no = 1;
                            foreach ($admin as $adm) :
                            ?>

                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $adm->nama ?></td>
                                    <td><?php echo $adm->email ?></td>
                                    <td><?php echo $adm->alamat ?></td>
                                    <td><?php echo $adm->no_wa ?></td>
                                    <td><img style="width: 100px;" src="<?php echo base_url() . '/uploads/' . $adm->gambar ?>"></td>

                                    <!-- tombol button -->
                                    <td> <?php echo anchor('dkm/Dashboard_dkm/detail_admin/' . $adm->id_adm, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?> </td>
                                    <td> <?php echo anchor('dkm/Dashboard_dkm/edit_admin/' . $adm->id_adm, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?> </td>
                                    <td> <?php echo anchor('dkm/Dashboard_dkm/hapus_admin/' . $adm->id_adm, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?> </td>
                                </tr>

                            <?php endforeach; ?>

                        </table>
                    </div>
                </div>
            </div>
    </section>


</div>

<!-- link button tambah -->
<!-- Modal -->
<div class="modal fade" id="tambah_bidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url() . 'dkm/Dashboard_dkm/tambah_admin'; ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="hidden" name="id_dnt" class="form-control" value="<?php echo $adm->id_adm ?>">
                        <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>EMAIL</label>
                        <input type="text" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>ALAMAT</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>NO WHATSAPP</label>
                        <input type="text" name="no_wa" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>GAMBAR </label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </form>
        </div>
    </div>
</div>