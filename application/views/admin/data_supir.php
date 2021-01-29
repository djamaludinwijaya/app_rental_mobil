<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Supir</h1>
        </div>
    </section>


    <a href="<?= base_url('admin/data_supir/tambah_supir') ?>" class="btn btn-primary mb-3">Tambah Supir</a>

    <?= $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($supir as $sp) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= ucfirst($sp['nama_supir']) ?></td>
                    <td><?= ucfirst($sp['gender']) ?></td>
                    <td><?= $sp['alamat_supir'] ?></td>
                    <td><?= $sp['no_telepon'] ?></td>
                    <td>
                        <a href="<?= base_url('admin/data_supir/update_supir/') . $sp['id_supir'] ?>" class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>

                        <a href="<?= base_url('admin/data_supir/delete_supir/') . $sp['id_supir'] ?>" class="btn btn-danger" onclick="return confirm('Yakin dihapus?')"><i class="fas fa-trash"></i></a>
                    </td>

                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</div>