<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Input Data Mobil</h1>
        </div>

        <div class="card">

            <div class="card-body">

                <form action="<?= base_url('admin/data_mobil/tambah_mobil_aksi') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="tipe_mobil">Type Mobil</label>
                                <select name="kode_type" id="tipe_mobil" class="form-control">
                                    <option value="">--Pilih Type Mobil--</option>
                                    <?php foreach ($type as $tp) : ?>
                                        <option value="<?= $tp['kode_type'] ?>"><?= $tp['nama_type'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kode_type', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="merk">Merk</label>
                                <input type="text" name="merk" id="merk" class="form-control">
                                <?= form_error('merk', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="no_plat">No. Plat</label>
                                <input type="text" name="no_plat" id="no_plat" class="form-control">
                                <?= form_error('no_plat', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="warna">Warna</label>
                                <input type="text" name="warna" id="warna" class="form-control">
                                <?= form_error('warna', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="ac">Ac</label>
                                <select name="ac" id="ac" class="form-control">
                                    <option value="">--Pilih Tersedia / Tidak-</option>
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                </select>
                                <?= form_error('ac', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="supir">Supir</label>
                                <select name="supir" id="supir" class="form-control">
                                    <option value="">--Pilih Tersedia / Tidak-</option>
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                </select>
                                <?= form_error('supir', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="mp3_player">Mp3_player</label>
                                <select name="mp3_player" id="mp3_player" class="form-control">
                                    <option value="">--Pilih Tersedia / Tidak-</option>
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                </select>
                                <?= form_error('mp3_player', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="central_lock">Central Lock</label>
                                <select name="central_lock" id="central_lock" class="form-control">
                                    <option value="">--Pilih Tersedia / Tidak-</option>
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                </select>
                                <?= form_error('central_lock', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="harga">Harga Sewa/Hari</label>
                                <input type="number" name="harga" id="harga" class="form-control">
                                <?= form_error('harga', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="denda">Denda</label>
                                <input type="number" name="denda" id="denda" class="form-control">
                                <?= form_error('denda', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="text" name="tahun" id="tahun" class="form-control">
                                <?= form_error('tahun', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">--Pilih Status--</option>
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                </select>
                                <?= form_error('status', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>


                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            <button type="reset" class="btn btn-danger mt-4">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>