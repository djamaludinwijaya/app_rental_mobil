<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Filter Laporan Transaksi</h1>
        </div>
    </section>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('admin/laporan') ?>" method="POST">

                        <div class="form-group">
                            <label for="">Dari Tanggal</label>
                            <input type="date" name="dari" class="form-control">
                            <?= form_error('dari', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="">Sampai Tanggal</label>
                            <input type="date" name="sampai" class="form-control">
                            <?= form_error('sampai', '<span class="text-small text-danger">', '</span>'); ?>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Tampilkan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>