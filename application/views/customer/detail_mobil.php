<div class="container mt-5 mb-5">
    <div class="card" style="margin-top: 200px;">
        <div class="card-body">
            <?php foreach ($detail_mobil as $dt) : ?>
                <div class="row">

                    <div class="col-md-6">
                        <img style="width: 70%; height:100%;" src="<?= base_url('assets/upload/') . $dt['gambar'] ?>" alt="">
                    </div>

                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>Merk</th>
                                <td><?= $dt['merk']; ?></td>
                            </tr>

                            <tr>
                                <th>No Plat</th>
                                <td><?= $dt['no_plat']; ?></td>
                            </tr>

                            <tr>
                                <th>Warna</th>
                                <td><?= $dt['warna']; ?></td>
                            </tr>

                            <tr>
                                <th>Tahun</th>
                                <td><?= $dt['tahun']; ?></td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td><?= $dt['status'] == 1 ? 'Tersedia' : '<span class="text-danger">Tidak Tersedia</span>'; ?></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <?php
                                    if ($dt['status'] == "0") {
                                        echo "<span class='btn btn-danger' disable>Telah di Rental</span>";
                                    } else {
                                        // menggunakan anchor untuk menggabungkan href dan button
                                        echo anchor('customer/rental/tambah_rental/' . $dt['id_mobil'], '<button class="btn btn-success">Rental</button>');
                                    }
                                    ?>
                                </td>
                            </tr>

                        </table>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>