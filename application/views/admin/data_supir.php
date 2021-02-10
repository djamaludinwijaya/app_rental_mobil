<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Supir</h1>
        </div>
    </section>


    <a href="<?= base_url('admin/data_supir/tambah_supir') ?>" class="btn btn-primary mb-3">Tambah Supir</a>

    <?= $this->session->flashdata('pesan') ?>

    <div class="table-responsive">
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
                            <div class="row-fluid">

                                <a href="<?= base_url('admin/data_supir/update_supir/') . $sp['id_supir'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <a href="<?= base_url('admin/data_supir/delete_supir/') . $sp['id_supir'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin dihapus?')"><i class="fas fa-trash"></i></a>

                                <a href="" class="btn btn-warning btn-sm" id="detail_supir" data-toggle="modal" data-target="#modal_supir" data-namasupir="<?= $sp['nama_supir']; ?>" data-status="<?= $sp['status_supir'] == 1 ? 'Tersedia' : 'Tidak Tersedia'; ?>" data-tarifkota="Rp. <?= number_format($sp['tarif_supir_dk'], 0, ',', '.') ?>" data-tarifluarkota="Rp. <?= number_format($sp['tarif_supir_lk'], 0, ',', '.') ?>"><i class="fas fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>


<!-- Modal Detail Data Supir -->
<div class="modal fade" id="modal_supir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Supir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <tr>
                        <td>Nama Supir</td>
                        <td>:</td>
                        <td class="nama_supir"></td>
                    </tr>

                    <tr>
                        <td>Status Supir</td>
                        <td>:</td>
                        <td class="status_supir"></td>
                    </tr>

                    <tr>
                        <td>Tarif Dalam Kota</td>
                        <td>:</td>
                        <td class="tdk"></td>
                    </tr>

                    <tr>
                        <td>Tarif Luar Kota</td>
                        <td>:</td>
                        <td class="tlk"></td>
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
    $(document).on('click', '#detail_supir', function() {
        const nama_supir = $(this).data('namasupir')
        const status_supir = $(this).data('status')
        const tarif_kota = $(this).data('tarifkota')
        const tarifluarkota = $(this).data('tarifluarkota')

        $('.nama_supir').html(nama_supir)
        $('.status_supir').html(status_supir)
        $('.tdk').html(tarif_kota)
        $('.tlk').html(tarifluarkota)
    })
</script>