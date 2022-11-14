<!-- <div class="container-fluid"> -->
<div class="content-wrapper">
    <h3><i class="fas fa-edit"></i>EDIT DATA ADMIN</h3>

    <?php foreach ($admin as $adm) : ?>
        <form method="post" action="<?php echo base_url() . 'operator/Dashboard_admin/update_admin' ?>" enctype="multipart/form-data">

            <div class="for-group">
                <label>ID ADMIN</label>
                <input type="text" name="id_adm" class="form-control" value="<?php echo $adm->id_adm ?>" readonly>
            </div>

            <div class="for-group">
                <label>NAMA</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $adm->nama ?>">
            </div>

            <div class="for-group">
                <label>EMAIL</label>
                <input type="hidden" name="id_adm" class="form-control" value="<?php echo $adm->id_adm ?>">
                <input type="text" name="email" class="form-control" value="<?php echo $adm->email ?>" readonly>
            </div>

            <div class="for-group">
                <label>ALAMAT</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $adm->alamat ?>">
            </div>

            <div class="for-group">
                <label>NO WHATSAPP</label>
                <input type="text" name="no_wa" class="form-control" value="<?php echo $adm->no_wa ?>">
            </div>

            <div class="form-group">
                <label>GAMBAR</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            <div class="form-group">
                <label>PASSWORD</label>
                <input type="text" name="password" class="form-control" value="<?php echo $adm->password ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">SIMPAN</button>

        </form>
    <?php endforeach; ?>
</div>