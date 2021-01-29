<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Update Data Supir</h1>
        </div>
    </section>

    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">

                    <form action="<?= base_url('admin/data_supir/update_supir_aksi') ?>" method="POST">
                        <input type="hidden" name="id_supir" value="<?= $supir['id_supir'] ?>">
                        <div class="form-group">
                            <label for="nama_supir">Nama</label>
                            <input type="text" name="nama_supir" class="form-control" id="nama_supir" value="<?= $supir['nama_supir'] ?>">
                            <?= form_error('nama_supir', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class=" form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <?php foreach ($gender as $g) : ?>
                                    <?php if ($supir['gender'] == $g) : ?>
                                        <option value="<?= $g ?>" selected><?= ucfirst($g) ?></option>
                                    <?php else : ?>
                                        <option value="<?= $g ?>"><?= ucfirst($g) ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('gender', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="alamat_supir">Alamat</label>
                            <input type="text" name="alamat_supir" class="form-control" id="alamat_supir" value="<?= $supir['alamat_supir'] ?>">
                            <?= form_error('alamat_supir', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" id="no_telepon" value="<?= $supir['no_telepon'] ?>">
                            <?= form_error('no_telepon', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>