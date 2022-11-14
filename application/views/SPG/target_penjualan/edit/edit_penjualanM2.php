<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Target Penjualan Week 2 Maret</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Target Penjualan Week 2 Maret</a></li>
                        <li class="breadcrumb-item active">Edit Data Target Week 2</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- <?= $this->session->flashdata('pesan'); ?> -->
    <?php
    if ($this->session->flashdata('error') != '') {
        echo '<div class="alert alert-danger" role="alert">';
        echo $this->session->flashdata('error');
        echo '</div>';
    }
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-bottom-primary">
                    <div class="card-header bg-white py-3">
                        <div class="row">
                            <div class="col">
                                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                    Form Edit Target Week 2
                                </h4>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url() ?>targetSPG/penjualan_maret" class="btn btn-sm btn-secondary btn-icon-split">
                                    <span class="icon">
                                        <i class="fa fa-arrow-left"></i>
                                    </span>
                                    <span class="text">
                                        Kembali
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>targetMaret/update_penjualan2" method="post">
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="nama_barang">Jenis Barang</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="hidden" name="id" value="<?= $target2->id ?>" />
                                        <select class="form-control" name="nama_barang" id="nama_barang">
                                            <option <?= $target2->nama_barang == "BC" || "FC" || "HC" || "BW" ? 'selected' : ''; ?> <?= set_select('nama_barang', $target2->nama_barang) ?> value="<?= $target2->nama_barang ?>"><?= $target2->nama_barang ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-md-right" for="harga_penjualan">Telah Terjual</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input value="<?= $target2->harga_penjualan ?>" name="harga_penjualan" id="harga_penjualan" type="text" class="form-control" placeholder="Input Total Terjual..">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->