<br><br><br><br>
<div class="container">

    <div class="row">

        <div class="col-md-8" style="margin-top: 20px;">
            <div class="card">

                <div class="card-header  alert alert-success">
                    Invoice Pembayaran Anda
                </div>

                <div class="card-body">

                    <table class="table">

                        <?php foreach ($transaksi as $tr) : ?>
                            <tr>
                                <th>Merek Mobil</th>
                                <td>:</td>
                                <td><?= $tr['merk']; ?></td>
                            </tr>

                            <tr>
                                <th>Tanggal Rental</th>
                                <td>:</td>
                                <td><?= $tr['tanggal_rental']; ?></td>
                            </tr>

                            <tr>
                                <th>Tanggal Kembali</th>
                                <td>:</td>
                                <td><?= $tr['tanggal_kembali']; ?></td>
                            </tr>

                            <tr>
                                <th>Biaya Sewa/Hari</th>
                                <td>:</td>
                                <td>Rp. <?= number_format($tr['harga'], 0, ',', '.'); ?></td>
                            </tr>

                            <tr>
                                <?php
                                $x = strtotime($tr['tanggal_kembali']);
                                $y = strtotime($tr['tanggal_rental']);
                                $jmlHari = abs(($x - $y) / (60 * 60 * 24));
                                ?>
                                <th>Jumlah Hari Sewa</th>
                                <td>:</td>
                                <td><?= $jmlHari; ?> Hari</td>
                            </tr>

                            <tr class="text-success">
                                <th>Jumlah Pembayaran</th>
                                <td>:</td>
                                <td><button class="btn btn-sm btn-success"><?= number_format($tr['harga'] * $jmlHari, 0, ',', '.') ?></button></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td><a href="<?= base_url('customer/transaksi/cetak_invoice/' . $tr['id_rental']) ?>" class="btn btn-sm btn-secondary" target="_blank">Print Invoice</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                </div>

            </div>
        </div>

        <div class="col-md-4" style="margin-top: 20px; margin-bottom:80px">
            <div class="card">
                <div class="card-header alert alert-primary">
                    Informasi Pembayaran
                </div>

                <div class="card-body">
                    <p class="text-success mb-3">Silahkan Melakukan Pembayaran Melalui Nomor Rekening dibawah ini:</p>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Bank Mandiri 1313131313</li>
                        <li class="list-group-item">Bank BCA 2424242</li>
                        <li class="list-group-item">Bank Bukopin 65222000</li>
                        <li class="list-group-item">Bank BNI 099999922</li>
                    </ul>

                    <?php
                    // apabila bukti pembayaran kosong di kolom bukti pembayaran
                    if (empty($tr['bukti_pembayaran'])) : ?>
                        <button type="button" style="width: 100%;" class="btn btn-danger mt-3" data-toggle="modal" data-target="#exampleModal">
                            Upload Bukti Pembayaran
                        </button>
                    <?php elseif ($tr['status_pembayaran'] == '0') : ?>
                        <button style="width: 100%;" class="btn btn-sm btn-warning"> <i class="fa fa-clock-o"></i> Menunggu Konfirmasi</button>
                    <?php elseif ($tr['status_pembayaran'] == '1') : ?>
                        <button style="width: 100%;" class="btn btn-sm btn-success"> <i class="fa fa-check"></i> Pembayaran Selesai</button>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>

</div>





<!-- Modal untuk upload bukti pembayran-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('customer/transaksi/pembayaran_aksi') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_rental" value="<?= $tr['id_rental'] ?>">
                    <div class="form-group">
                        <label for="">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti_pembayaran" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>