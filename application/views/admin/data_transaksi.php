<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
        </div>
    </section>
    <?= $this->session->flashdata('pesan') ?>
    <table class="table table-responsive table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Tgl. Rental</th>
                <th>Tgl. kembali</th>
                <th>Total Denda</th>
                <th>Tgl. Dikembalikan</th>
                <th>Status Pengembalian</th>
                <th>Status Rental</th>
                <th>Cek Pembayaran</th>
                <th>Actions</th>
            </tr>
        </thead>

        <?php
        $no = 1;
        foreach ($transaksi as $tr) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= ucfirst($tr['nama']); ?></td>
                <td><?= date('d/m/Y', strtotime($tr['tanggal_rental'])); ?></td>
                <td><?= date('d/m/Y', strtotime($tr['tanggal_kembali'])); ?></td>
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


                <td>
                    <center>
                        <?php if (empty($tr['bukti_pembayaran'])) : ?>
                            <span class="text-danger">Belum Upload!</span>
                        <?php elseif ($tr['status_pembayaran'] == 0) : ?>
                            <a class="btn btn-sm btn-primary" href="<?= base_url('admin/transaksi/pembayaran/' . $tr['id_rental']) ?>"><i class="fas fa-check-circle"></i></a>
                        <?php else : ?>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>

                        <?php endif; ?>
                    </center>
                </td>

                <td>
                    <?php if ($tr['status_pembayaran'] == '1') { ?>
                        <?php
                        if ($tr['status_rental'] == 'selesai' and $tr['status_pengembalian'] == 'kembali') { ?>
                            <div class="row">
                                <div class="col">
                                    <a onclick="return confirm('Yakin Batal Transaksi?')" href="<?= base_url('admin/transaksi/transaksi_batal/' . $tr['id_rental']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                </div>
                                <div class="col">
                                    <button class="btn btn-sm btn-warning" id="detail" data-toggle="modal" data-target="#exampleModal" data-nama="<?= $tr['nama'] ?>" data-merk="<?= $tr['merk'] ?>" data-harga="Rp. <?= number_format($tr['harga'], 0, ',', '.') ?>" data-denda="Rp. <?= number_format($tr['denda'], 0, ',', '.') ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                </div>
                            </div>
                        <?php  } else { ?>
                            <div class="row">
                                <div class="col">
                                    <a href="<?= base_url('admin/transaksi/transaksi_selesai/' . $tr['id_rental']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>

                                </div>

                                <div class="col">
                                    <a href="<?= base_url('admin/transaksi/transaksi_batal/' . $tr['id_rental']) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                </div>

                            </div>
                        <?php
                        } ?>
                    <?php } else { ?>
                        <button class="btn btn-sm btn-warning" id="detail" data-toggle="modal" data-target="#exampleModal" data-nama="<?= $tr['nama'] ?>" data-merk="<?= $tr['merk'] ?>" data-harga="Rp. <?= number_format($tr['harga'], 0, ',', '.') ?>" data-denda="Rp. <?= number_format($tr['denda'], 0, ',', '.') ?>">
                            <i class="fas fa-eye"></i>
                        </button>

                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>

        <tbody>
        </tbody>
    </table>

    <span class="text-warning mt-4">*Jika belum upload bukti pembayaran, segera konfirm konsumen</span>
</div>


<!-- Modal Detail Transaksi -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td class="nama"></td>
                    </tr>

                    <tr>
                        <td>Merek Mobil</td>
                        <td>:</td>
                        <td class="merk"></td>
                    </tr>

                    <tr>
                        <td>Harga Sewa/Hari</td>
                        <td>:</td>
                        <td class="harga"></td>
                    </tr>

                    <tr>
                        <td>Denda/Hari</td>
                        <td>:</td>
                        <td class="denda"></td>
                    </tr>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#detail').on('click', function() {
        const id = $(this).data('id')
        const nama = $(this).data('nama')
        const merk = $(this).data('merk')
        const harga = $(this).data('harga')
        const denda = $(this).data('denda')

        $('.nama').html(nama)
        $('.merk').html(merk)
        $('.harga').html(harga)
        $('.denda').html(denda)





    })
</script>