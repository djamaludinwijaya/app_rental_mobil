<div class="container">
    <div class="card" style="margin-top: 150px;">
        <div class="card-header">
            Form Rental Mobil
        </div>

        <div class="card-body">
            <?php foreach ($detail as $dt) : ?>
                <form method="POST" action="<?= base_url('customer/rental/tambah_rental_aksi'); ?>">

                    <div class="form-group">
                        <label for="harga">Harga Sewa/Hari</label>
                        <input type="hidden" name="id_mobil" value="<?= $dt['id_mobil'] ?>">
                        <input type="text" name="harga" id="harga" class="form-control" value="Rp. <?= number_format($dt['harga'], 0, ',', '.'); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="denda">Denda Sewa/Hari</label>
                        <input type="text" name="denda" id="denda" class="form-control" value="Rp. <?= number_format($dt['denda'], 0, ',', '.'); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_rental">Tanggal Rental</label>
                        <input type="date" name="tanggal_rental" id="tanggal_rental" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-warning">Rental</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>