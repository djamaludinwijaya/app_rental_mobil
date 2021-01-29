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

    <!-- set value dari name dari dan sampai  -->
    <div class="btn-group">
        <a href="<?= base_url('admin/laporan/print_laporan/?dari=' . set_value('dari')) . '&sampai=' . set_value('sampai') ?>" class="btn btn-success mb-3" target="_blank"><i class="fas fa-print"></i> Print</a>
    </div>


    <table class="table table-responsive table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Mobil</th>
                <th>Tgl. Rental</th>
                <th>Tgl. kembali</th>
                <th>Harga/Hari</th>
                <th>Denda/Hari</th>
                <th>Total Denda</th>
                <th>Tgl. Dikembalikan</th>
                <th>Status Pengembalian</th>
                <th>Status Rental</th>
            </tr>
        </thead>

        <?php
        $no = 1;
        foreach ($laporan as $tr) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= ucfirst($tr['nama']); ?></td>
                <td><?= $tr['merk']; ?></td>
                <td><?= date('d/m/Y', strtotime($tr['tanggal_rental'])); ?></td>
                <td><?= date('d/m/Y', strtotime($tr['tanggal_kembali'])); ?></td>
                <td>Rp. <?= number_format($tr['harga'], 0, ',', '.'); ?></td>
                <td>Rp. <?= number_format($tr['denda'], 0, ',', '.'); ?></td>

                <td>Rp. <?= number_format($tr['total_denda'], 0, ',', '.'); ?></td>
                <td>
                    <?php if ($tr['tanggal_pengembalian'] == "0000-00-00") {
                        echo "-";
                    } else {
                        echo date('d/m/Y', strtotime($tr['tanggal_pengembalian']));
                    }
                    ?>
                </td>

                <td><?= ucfirst($tr['status_pengembalian']) ?></td>
                <td><?= ucfirst($tr['status_rental']) ?></td>
            </tr>
        <?php endforeach; ?>

        <tbody>
        </tbody>
    </table>

</div>