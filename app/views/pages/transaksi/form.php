<div class="container-fluid">

    <div class="d-flex justify-content-between">
        <div>
            <h1 class="h3 mb-3 text-gray-800">Entry Transaksi SPP - <?= $data['siswa']['nama'] ?></h1>
        </div>
        <div>
            <a href="<?= url('/entrytransaksi') ?>" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
    <!-- Page Heading -->

    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header py-3 bg-gradient-primary">
                    <h6 class="m-0 font-weight-bold text-white">Biodata Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-3 pl-5">
                            <p style="font-weight: 800 !important;">NIS</p>
                            <p><?= $data['siswa']['nis'] ?></p>
                        </div>
                        <div class="col-md-6 mb-3 pl-5">
                            <p style="font-weight: 800 !important;">NISN</p>
                            <p><?= $data['siswa']['nisn'] ?></p>
                        </div>
                        <div class="col-md-6 mb-3 pl-5">
                            <p style="font-weight: 800 !important;">Nama</p>
                            <p><?= $data['siswa']['nama'] ?></p>
                        </div>
                        <div class="col-md-6 mb-3 pl-5">
                            <p style="font-weight: 800 !important;">Kelas dan Jurusan</p>
                            <p>
                                <?= $data['siswa']['kelas_nama'] ?>
                                <?= $data['siswa']['kelas_kompetensi_keahlian'] ?>
                            </p>
                        </div>
                        <div class="col-md-6 mb-3 pl-5">
                            <p style="font-weight: 800 !important;">Alamat</p>
                            <p><?= $data['siswa']['alamat'] ?></p>
                        </div>
                        <div class="col-md-6 mb-3 pl-5">
                            <p style="font-weight: 800 !important;">Telepon</p>
                            <p><?= $data['siswa']['telepon'] ?></p>
                        </div>
                        <div class="col-md-6 mb-3 pl-5">
                            <p style="font-weight: 800 !important;">Tahun Ajaran</p>
                            <p><?= $data['siswa']['pembayaran_tahun_ajaran'] ?></p>
                        </div>
                        <div class="col-md-6 mb-3 pl-5">
                            <p style="font-weight: 800 !important;">Nominal Pembayaran SPP</p>
                            <p><?= $data['siswa']['pembayaran_nominal'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php Flasher::flash(function($flash) { ?>
        <div class="alert alert-<?= $flash['status'] == 'success' ? 'success' : 'danger' ?>" role="alert">
            <?= $flash['message'] ?>
        </div>
    <?php }) ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h6 class="m-0 font-weight-bold text-white">Rincian Pembayaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SPP Pembayaran</th>
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th>Tanggal Bayar</th>
                            <th>Lunas?</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['transaksi'] as $transaksi) { ?>
                            <tr>
                                <td>
                                    <?= $transaksi['tahun_ajaran'] ?>
                                    (<?= $transaksi['nominal'] ?>)
                                </td>
                                <td><?= $transaksi['tahun_dibayar'] ?></td>
                                <td><?= date('F', mktime(0, 0, 0, $transaksi['bulan_dibayar'], 1,)) ?></td>
                                <td><?= isset($transaksi['tanggal_bayar']) ?  date('Y M d H:i:s A', strtotime($transaksi['tanggal_bayar']) + 60*60 ) : '-' ?></td>
                                <td class="text-center">
                                    <?php if(isset($transaksi['tanggal_bayar'])) { ?>
                                        <div class="btn btn-success btn-sm">Sudah</div>
                                    <?php } else { ?>
                                        <div class="btn btn-danger btn-sm">Belum</div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if(isset($transaksi['tanggal_bayar'])) { ?>
                                        <a href="<?= url('/entrytransaksi/edit/' . $data['siswa']['id'] . '/' . $transaksi['id']) ?>" class="btn btn-sm btn-secondary">Batal</a>
                                    <?php } else { ?>
                                        <a href="<?= url('/entrytransaksi/store/' . $data['siswa']['id'] . '/' . $transaksi['id']) ?>" class="btn btn-sm btn-secondary">Bayar</a>
                                    <?php } ?>
                                    <a href="<?= url('/entrytransaksi/delete/' . $data['siswa']['id'] . '/' . $transaksi['id']) ?>" class="btn btn-sm btn-secondary" onclick="return confirm('yakin ingin menghapus data ini?')"><i class="fas fa-fw fa-trash"></i></a>
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