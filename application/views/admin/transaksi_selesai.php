<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi Selesai</h1>
        </div>
    </section>

    <div class="card">
        <div class="card-body">
            <?php foreach ($transaksi as $tr) : ?>
                <form action="<?= base_url('admin/transaksi/transaksi_selesai_aksi') ?>" method="POST">
                    <input type="hidden" name="id_rental" value="<?= $tr['id_rental'] ?>">
                    <input type="hidden" name="tanggal_kembali" value="<?= $tr['tanggal_kembali'] ?>">
                    <input type="hidden" name="denda" value="<?= $tr['denda']; ?>">
                    <input type="hidden" name="id_mobil" value="<?= $tr['id_mobil']; ?>">

                    <div class="form-group">
                        <label for="">Tangal Pengembalian</label>
                        <input type="date" name="tanggal_pengembalian" class="form-control" value="<?= $tr['tanggal_pengembalian'] ?>">
                    </div>


                    <div class="form-group">
                        <label for="status_pengembalian">Status Pengembalian</label>
                        <select id="status_pengembalian" name="status_pengembalian" class="form-control">
                            <?php foreach ($status_pengembalian as $sp) : ?>
                                <?php if ($tr['status_pengembalian'] == $sp) : ?>
                                    <option value="<?= $sp; ?>" selected><?= ucfirst($sp); ?></option>
                                <?php else : ?>
                                    <option value="<?= $sp; ?>"><?= ucfirst($sp); ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status_rental">Status Rental</label>
                        <select id="" name="status_rental" class="form-control">
                            <?php foreach ($status_rental as $sr) : ?>
                                <?php if ($tr['status_rental'] == $sr) : ?>
                                    <option value="<?= $sr; ?>" selected><?= ucfirst($sr); ?></option>
                                <?php else : ?>
                                    <option value="<?= $sr; ?>"><?= ucfirst($sr); ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>

                </form>
            <?php endforeach; ?>

        </div>
    </div>

</div>