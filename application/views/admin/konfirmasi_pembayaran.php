<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Konfirmasi Pembayaran</h1>
        </div>
    </section>

    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <div class="card-header d-flex justify-content-center">
                    <center>Konfirmasi Pembayaran</center>
                </div>

                <div class="card-body text-center">

                    <form action="<?= base_url('admin/transaksi/cek_pembayaran') ?>" method="POST">
                        <?php foreach ($pembayaran as $pmb) : ?>
                            <a class="btn btn-sm btn-success" href="<?= base_url('admin/transaksi/download_pembayaran/' . $pmb['id_rental']) ?>"><i class="fas fa-download"></i> Download Bukti Pembayaran</a>

                            <input type="hidden" value="<?= $pmb['id_rental'] ?>" name="id_rental">

                            <div class="custom-control custom-switch ml-4">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="status_pembayaran">
                                <label class="custom-control-label" for="customSwitch1">Konfirmasi Pembayaran</label>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>

                        <?php endforeach; ?>
                    </form>

                </div>

            </div>

        </div>
    </div>


</div>