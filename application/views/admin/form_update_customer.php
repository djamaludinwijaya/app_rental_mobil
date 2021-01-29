<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Input Data Customer</h1>
        </div>
    </section>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="<?= base_url('admin/data_customer/update_customer_aksi') ?>" method="POST">
                        <input type="hidden" name="id_customer" value="<?= $customer['id_customer'] ?>">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $customer['nama'] ?>">
                            <?= form_error('nama', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?= $customer['username'] ?>">
                            <?= form_error('username', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $customer['alamat'] ?>">
                            <?= form_error('alamat', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <?php foreach ($jenis_kelamin as $j) : ?>
                                    <?php if ($j == $customer['jenis_kelamin']) : ?>
                                        <option value="<?= $j; ?>" selected><?= $j; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j; ?>"><?= $j; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </select>
                            <?= form_error('gender', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" id="no_telepon" value="<?= $customer['no_telepon'] ?>">
                            <?= form_error('no_telepon', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="no_ktp">No KTP</label>
                            <input type="text" name="no_ktp" class="form-control" id="no_ktp" value="<?= $customer['no_ktp'] ?>">
                            <?= form_error('no_ktp', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <?= form_error('password', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>