<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Update Data Mobil</h1>
        </div>

        <div class="card">

            <div class="card-body">
                <form action="<?= base_url('admin/data_mobil/update_mobil_aksi') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $mobil['id_mobil'] ?>" name="id_mobil">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="tipe_mobil">Type Mobil</label>
                                <select name="kode_type" id="tipe_mobil" class="form-control">
                                    <?php foreach ($type as $tp) : ?>
                                        <?php if ($tp['kode_type'] == $mobil['kode_type']) : ?>
                                            <option value="<?= $tp['kode_type']; ?>" selected><?= $tp['kode_type'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $tp['kode_type'] ?>"><?= $tp['kode_type'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kode_type', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="merk">Merk</label>
                                <input type="text" name="merk" id="merk" class="form-control" value="<?= $mobil['merk'] ?>">
                                <?= form_error('merk', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="no_plat">No. Plat</label>
                                <input type="text" name="no_plat" id="no_plat" class="form-control" value="<?= $mobil['no_plat'] ?>">
                                <?= form_error('no_plat', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="warna">Warna</label>
                                <input type="text" name="warna" id="warna" class="form-control" value="<?= $mobil['warna'] ?>">
                                <?= form_error('warna', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="ac">Ac</label>
                                <select name="ac" id="ac" class="form-control">
                                    <option <?php if ($mobil['ac'] == 1) {
                                                echo "selected";
                                            } ?> value=1>Tersedia</option>
                                    <option <?php if ($mobil['ac'] == 0) {
                                                echo "selected";
                                            } ?> value=0>Tidak Tersedia</option>
                                </select>
                                <?= form_error('ac', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="supir">Supir</label>
                                <select name="supir" id="supir" class="form-control">
                                    <option <?php if ($mobil['supir'] == 1) {
                                                echo "selected";
                                            } ?> value=1>Tersedia</option>
                                    <option <?php if ($mobil['supir'] == 0) {
                                                echo "selected";
                                            } ?> value=0>Tidak Tersedia</option>
                                </select>
                                <?= form_error('supir', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="mp3_player">mp3_player</label>
                                <select name="mp3_player" id="mp3_player" class="form-control">
                                    <option <?php if ($mobil['mp3_player'] == 1) {
                                                echo "selected";
                                            } ?> value=1>Tersedia</option>
                                    <option <?php if ($mobil['mp3_player'] == 0) {
                                                echo "selected";
                                            } ?> value=0>Tidak Tersedia</option>
                                </select>
                                <?= form_error('mp3_player', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="central_lock">Central Lock</label>
                                <select name="central_lock" id="central_lock" class="form-control">
                                    <option <?php if ($mobil['central_lock'] == 1) {
                                                echo "selected";
                                            } ?> value=1>Tersedia</option>
                                    <option <?php if ($mobil['central_lock'] == 0) {
                                                echo "selected";
                                            } ?> value=0>Tidak Tersedia</option>
                                </select>
                                <?= form_error('central_lock', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="harga">Harga Sewa/Hari</label>
                                <input type="text" name="harga" id="harga" class="form-control" value="<?= $mobil['harga'] ?>">
                                <?= form_error('harga', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="denda">Denda</label>
                                <input type="text" name="denda" id="denda" class="form-control" value="<?= $mobil['denda'] ?>">
                                <?= form_error('denda', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="text" name="tahun" id="tahun" class="form-control" value="<?= $mobil['tahun'] ?>">
                                <?= form_error('tahun', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option <?php if ($mobil['status'] == 1) {
                                                echo "selected";
                                            } ?> value=1>Tersedia</option>
                                    <option <?php if ($mobil['status'] == 0) {
                                                echo "selected";
                                            } ?> value=0>Tidak Tersedia</option>
                                </select>
                                <?= form_error('status', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>


                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Update</button>
                            <button type="reset" class="btn btn-danger mt-4">Reset</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>