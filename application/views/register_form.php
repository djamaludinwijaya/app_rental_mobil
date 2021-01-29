<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="<?= base_url('assets/assets_stisla') ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="post" action="<?= base_url('register') ?>">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama">Nama</label>
                                            <input id="nama" type="text" class="form-control" name="nama" autofocus>
                                            <?= form_error('nama', '<span class="text-small text-danger">', '</span>'); ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="username">Username</label>
                                            <input id="username" type="text" class="form-control" name="username">
                                            <?= form_error('username', '<span class="text-small text-danger">', '</span>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">alamat</label>
                                        <input id="alamat" type="text" class="form-control" name="alamat">
                                        <?= form_error('alamat', '<span class="text-small text-danger">', '</span>'); ?>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="gender" class="d-block">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">-- Pilih Gender --</option>
                                                <option value="laki-laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                            <?= form_error('gender', '<span class="text-small text-danger">', '</span>'); ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="no_telepon" class="d-block">No Telepon</label>
                                            <input id="no_telepon" type="text" class="form-control" name="no_telepon">
                                            <?= form_error('no_telepon', '<span class="text-small text-danger">', '</span>'); ?>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="no_ktp">No KTP</label>
                                            <input type="text" name="no_ktp" id="no_ktp" class="form-control">
                                            <?= form_error('no_ktp', '<span class="text-small text-danger">', '</span>'); ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                            <?= form_error('password', '<span class="text-small text-danger">', '</span>'); ?>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>

                                    <a href="<?= base_url('auth') ?>" class="btn btn-warning btn-lg btn-block">Login</a>

                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>