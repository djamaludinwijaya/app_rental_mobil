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
                    <form action="<?= base_url('admin/data_customer/tambah_customer_aksi') ?>" method="POST">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                            <?= form_error('nama', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                            <?= form_error('username', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                            <?= form_error('alamat', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">-- Pilih Gender --</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            <?= form_error('gender', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" id="no_telepon">
                            <?= form_error('no_telepon', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="no_ktp">No KTP</label>
                            <input type="text" name="no_ktp" class="form-control" id="no_ktp">
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