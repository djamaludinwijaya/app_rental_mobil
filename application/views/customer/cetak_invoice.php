<table style="width: 60%;">
    <h2>Invoice Pembayaran Anda</h2>
    <?php foreach ($transaksi as $tr) : ?>

        <tr>
            <td>Nama Customer</td>
            <td>:</td>
            <td><?= ucfirst($tr['nama']) ?></td>
        </tr>

        <tr>
            <td>Merek Mobil</td>
            <td>:</td>
            <td><?= $tr['merk']; ?></td>
        </tr>

        <tr>
            <td>Tanggal Rental</td>
            <td>:</td>
            <td><?= $tr['tanggal_rental']; ?></td>
        </tr>

        <tr>
            <td>Tanggal Kembali</td>
            <td>:</td>
            <td><?= $tr['tanggal_kembali']; ?></td>
        </tr>

        <tr>
            <td>Biaya Sewa/Hari</td>
            <td>:</td>
            <td>Rp. <?= number_format($tr['harga'], 0, ',', '.'); ?></td>
        </tr>

        <tr>
            <?php $x = strtotime($tr['tanggal_kembali']);
            $y = strtotime($tr['tanggal_rental']);
            $jmlHari = abs(($x - $y) / (60 * 60 * 24));
            ?>
            <td>Jumlah Hari Sewa</td>
            <td>:</td>
            <td><?= $jmlHari; ?> Hari</td>
        </tr>

        <tr>
            <td>Status Pembayaran</td>
            <td>:</td>
            <td><?= $tr['status_pembayaran'] == '0' ? 'Belum Lunas' : 'Lunas Pembayaran'  ?></td>
        </tr>

        <tr style="font-weight: bold; color:red;">
            <td>Jumlah Pembayaran</td>
            <td>:</td>
            <td><?= number_format($tr['harga'] * $jmlHari, 0, ',', '.') ?></td>
        </tr>

        <tr>
            <td>Rekening Pembayaran</td>
            <td>:</td>
            <td>
                <ul>
                    <li>Bank Mandiri 1313131313</li>
                    <li>Bank BCA 2424242</li>
                    <li>Bank Bukopin 65222000</li>
                    <li>Bank BNI 099999922</li>
                </ul>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
    window.print();
</script>