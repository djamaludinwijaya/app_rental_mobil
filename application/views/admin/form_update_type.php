<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Update Type Mobil</h1>
        </div>
    </section>

    <div class="card">
        <div class="card-body">

            <form action="<?= base_url('admin/data_type/update_type_aksi') ?>" method="POST">
                <input type="hidden" name="id_type" value="<?= $type['id_type'] ?>">
                <div class="form-group">
                    <label for="kode_type">Kode Type</label>
                    <input type="text" name="kode_type" id="kode_type" class="form-control" value="<?= $type['kode_type'] ?>">
                    <?= form_error('kode_type', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="nama_type">Nama Type</label>
                    <input type="text" name="nama_type" id="nama_type" class="form-control" value="<?= $type['nama_type'] ?>">
                    <?= form_error('nama_type', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>


</div>