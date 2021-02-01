<div class="container" style="margin-bottom: 100px;">
    <div class="card" style="margin-top: 100px;">
        <div class="card-header">
            Form Rental Mobil
        </div>

        <div class="card-body">
            <?php foreach ($detail as $dt) : ?>
                <form method="POST" action="<?= base_url('customer/rental/tambah_rental_aksi'); ?>">

                    <div class="form-group">
                        <label for="merk">Merek Mobil</label>
                        <input type="text" name="merk" id="merk" class="form-control" value="<?= $dt['merk'] ?>" readonly>
                    </div>

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
                        <label for="ket">Lepas kunci / Supir</label>
                        <select name="ket" id="ket" class="form-control">
                            <option>-- Pilih Supir ---</option>
                            <option value="0" class="lepas">Lepas Kunci</option>
                            <option value="<?= $supir['id_supir'] ?>">Supir</option>
                        </select>
                    </div>

                    <div class="form-group" id="jangkauan" style="display: none;">
                        <label for="ket">Dalam Kota/ Luar kota</label>
                        <select name="ket" id="ket" class="form-control">
                            <option>-- Pilih Jangkauan ---</option>
                            <option value="0">Dalam Kota (24 jam / Rp. 350.000)</option>
                            <option value="1">Luar Kota (24 jam / Rp. 500.000)</option>
                        </select>
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

<script>
    $(document).on('change', '#ket', function(e) {
        if ($(this).val() == '0') {
            $('#jangkauan').hide()
        } else {
            $('#jangkauan').show()
        }
    })
</script>