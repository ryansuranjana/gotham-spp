<div class="container-fluid">

    <div class="d-flex justify-content-between">
        <div>
            <h1 class="h3 mb-3 text-gray-800">Detail Siswa - <?= $data['siswa']['nama'] ?></h1>
        </div>
        <div>
            <a href="<?= url('/siswa') ?>" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
    <!-- Page Heading -->

    <div class="row justify-content-center mb-3">
        <div class="col-md-10 col-12">
            <div class="card">
                <div class="card-header py-3 bg-gradient-primary">
                    <h6 class="m-0 font-weight-bold text-white">Biodata Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p style="font-weight: 800 !important;">NIS</p>
                            <p><?= $data['siswa']['nis'] ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p style="font-weight: 800 !important;">NISN</p>
                            <p><?= $data['siswa']['nisn'] ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p style="font-weight: 800 !important;">Nama</p>
                            <p><?= $data['siswa']['nama'] ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p style="font-weight: 800 !important;">Kelas dan Jurusan</p>
                            <p>
                                <?= $data['siswa']['kelas_nama'] ?>
                                <?= $data['siswa']['kelas_kompetensi_keahlian'] ?>
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p style="font-weight: 800 !important;">Alamat</p>
                            <p><?= $data['siswa']['alamat'] ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p style="font-weight: 800 !important;">Telepon</p>
                            <p><?= $data['siswa']['telepon'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h6 class="m-0 font-weight-bold text-white">Data Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SPP Pembayaran</th>
                            <th>Tanggal Bayar</th>
                            <th>Bulan Dibayar</th>
                            <th>Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['transaksi'] as $transaksi) { ?>
                            <tr>
                                <td>
                                    <?= $transaksi['tahun_ajaran'] ?>
                                    (<?= $transaksi['nominal'] ?>)
                                </td>
                                <td><?= $transaksi['tanggal_bayar'] ?></td>
                                <td><?= $transaksi['bulan_dibayar'] ?></td>
                                <td>
                                    <?= $transaksi['petugas_nama'] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php require_once '../app/views/includes/script.php' ?>
<script type="application/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    })
</script>