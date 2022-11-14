<div class="container-fluid">
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
                                    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_donatur"><i class="fas fa-plus fa-sm"></i> Tambah Data Donatur </button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped responsive">

                                <tr align="center" class="tag-responsive">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>ALAMAT</th>
                                    <th>NO WHATSAPP</th>
                                    <th>GAMBAR</th>
                                    <th>PASSWORD</th>
                                    <th>QR-CODE</th>
                                    <th colspan="3">AKSI</th>
                                </tr>

                                <?php
                                $no = 1;
                                foreach ($donatur as $dnt) :
                                ?>

                                    <tr align="center">
                                        <td data-header="NO">
                                            <div class="main"> <?php echo $no++ ?></div>
                                        </td>

                                        <td data-header="NAMA">
                                            <div class="main"> <?php echo $dnt->nama ?></div>
                                        </td>

                                        <td data-header="EMAIL">
                                            <div class="main"> <?php echo $dnt->email ?></div>
                                        </td>

                                        <td data-header="ALAMAT">
                                            <div class="main"> <?php echo $dnt->alamat ?></div>
                                        </td>

                                        <td data-header="NO WHATSAPP">
                                            <div class="main"> <?php echo $dnt->no_wa ?></div>
                                        </td>

                                        <td data-header="GAMBAR">
                                            <div class="main"><img style="width: 100px;" src="<?php echo base_url() . '/uploads/' . $dnt->gambar ?>"></div>
                                        </td>

                                        <td data-header="PASSWORD">
                                            <div class="main"><?php echo $dnt->password ?></div>
                                        </td>

                                        <td data-header="QR-CODE">
                                            <div class="main"> <img style="width: 100px;" src="<?php echo base_url() . 'assets/images/' . $dnt->qr_code; ?>"> </div>
                                        </td>
                                        <!-- tombol button -->




                                        <td data-header="AKSI">
                                            <!-- <?php echo anchor('operator/Dashboard_admin/detail_donatur/' . $dnt->id_dnt, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?> -->

                                            <?php echo anchor('operator/Dashboard_admin/detail_donatur/' . $dnt->id_dnt, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?>
                                            <?php echo anchor('operator/Dashboard_admin/edit_donatur/' . $dnt->id_dnt, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
                                            <?php echo anchor('operator/Dashboard_admin/hapus_donatur/' . $dnt->id_dnt, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                                        </td>
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
    <div class="modal fade" id="tambah_donatur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Donatur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url() . 'operator/Dashboard_admin/tambah_donatur'; ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>NAMA</label>
                            <input type="hidden" name="id_dnt" class="form-control" value="<?php echo $dnt->id_dnt ?>">
                            <input type="text" name="nama" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>EMAIL</label>
                            <input type="hidden" name="id_user" class="form-control" value="<?php echo $dnt->id_dnt ?>">
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
</div>