<div class="container">

    <div class="card" style="margin-top: 180px; width : 80%">
        <div class="card-header">
            Data Transaksi Anda
        </div>

        <span class="mt-2 p-2"><?= $this->session->flashdata('pesan'); ?></span>
        <div class="card-body" style="width: 100%;">
            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Merk Mobil</th>
                        <th>No Plat</th>
                        <th>Harga Sewa</th>
                        <th>Actions</th>
                        <th>Batal</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1;
                    foreach ($transaksi as $tr) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $tr['nama'] ?></td>
                            <td><?= $tr['merk'] ?></td>
                            <td><?= $tr['no_plat'] ?></td>
                            <td>Rp. <?= number_format($tr['harga'], 0, ',', ',') ?></td>
                            <td>
                                <?php if ($tr['status_rental'] == 'selesai') { ?>
                                    <button class="btn btn-sm btn-danger">Rental Selesai</button>
                                <?php } else { ?>
                                    <a href="<?= base_url('customer/transaksi/pembayaran/') . $tr['id_rental'] ?>" class="btn btn-sm btn-success">Cek Pembayaran</a>
                                <?php } ?>
                            </td>

                            <td>
                                <?php if ($tr['status_rental'] == 'belum selesai') : ?>
                                    <a onclick="return confirm('Yakin Batal?')" href="<?= base_url('customer/transaksi/batal_transaksi/' . $tr['id_rental']) ?>" class="btn btn-sm btn-danger">Batal</a>

                                <?php else : ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                                        Batal
                                    </button>

                                <?php endif; ?>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</div>


<!-- Modal untuk informasi bahwa apabila status rental selesai menampilkan informasi-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi Batal Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Maaf Transaksi ini sudah selesai dan tidak bisa dibatalkan!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Exit</button>
            </div>
        </div>
    </div>
</div>