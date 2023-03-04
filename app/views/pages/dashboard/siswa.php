<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
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

    <!-- Content Row -->

    <div class="row mb-3">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <video autoplay loop width="100%">
                        <source src="<?= asset('/videos/gotham.mp4') ?>">
                    </video>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

<?php require_once '../app/views/includes/script.php' ?>