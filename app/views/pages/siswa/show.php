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

</div>

<?php require_once '../app/views/includes/script.php' ?>