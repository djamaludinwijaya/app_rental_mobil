<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Customer</h1>
        </div>


    </section>


    <a href="<?= base_url('admin/data_customer/tambah_customer') ?>" class="btn btn-primary mb-3">Tambah Customer</a>

    <?= $this->session->flashdata('pesan') ?>

    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>Gender</th>
                <th>No Telepon</th>
                <th>No KTP</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($customer as $c) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $c['nama'] ?></td>
                    <td><?= $c['username'] ?></td>
                    <td><?= $c['alamat'] ?></td>
                    <td><?= $c['gender'] ?></td>
                    <td><?= $c['no_telepon'] ?></td>
                    <td><?= $c['no_ktp'] ?></td>

                    <td>
                        <div class="row">
                            <div class="col">
                                <a href="<?= base_url('admin/data_customer/update_customer/') . $c['id_customer'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            </div>
                            <div class="col">
                                <a href="<?= base_url('admin/data_customer/delete_customer/') . $c['id_customer'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin dihapus?')"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
</div>
</td>

</tr>

<?php endforeach; ?>
</tbody>
</table>

</div>