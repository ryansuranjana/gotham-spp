<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['page_title'] ?></h1>

    <?php Flasher::flash(function($flash) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $flash['message'] ?>
        </div>
    <?php }) ?>


    <div class="row">
        <div class="col-12">
            <form action="<?= isset($data['siswa']) ? url('/siswa/update/' . $data['siswa']['id']) : url('/siswa/store') ?>" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="nis">NIS <span class="text-danger">*</span></label>
                                    <input type="text" id="nis" class="form-control" name="nis" placeholder="Masukkan Nis" value="<?= isset($data['siswa']) ? $data['siswa']['nis'] : '' ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="nisn">NISN <span class="text-danger">*</span></label>
                                    <input type="text" id="nisn" class="form-control" name="nisn" placeholder="Masukkan Nisn" value="<?= isset($data['siswa']) ? $data['siswa']['nisn'] : '' ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="nama">Nama <span class="text-danger">*</span></label>
                                    <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?= isset($data['siswa']) ? $data['siswa']['nama'] : '' ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="kelas_id">Kelas <span class="text-danger">*</span></label>
                                    <select name="kelas_id" id="kelas_id" class="form-control" required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        <?php foreach($data['kelas'] as $kelas) { ?>
                                            <option value="<?= $kelas['id'] ?>" <?= isset($data['siswa']) && $data['siswa']['kelas_id'] == $kelas['id'] ? 'selected' : '' ?> >
                                                <?= $kelas['nama'] ?>
                                                <?= $kelas['kompetensi_keahlian'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="pembayaran_id">SPP Pembayaran <span class="text-danger">*</span></label>
                                    <select name="pembayaran_id" id="pembayaran_id" class="form-control" required>
                                        <option value="" disabled selected>Pilih SPP Pembayaran</option>
                                        <?php foreach($data['spp'] as $spp) { ?>
                                            <option value="<?= $spp['id'] ?>" <?= isset($data['siswa']) && $data['siswa']['pembayaran_id'] == $spp['id'] ? 'selected' : '' ?> >
                                                <?= $spp['tahun_ajaran'] ?>
                                                (<?= $spp['nominal'] ?>)
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="telepon">Telepon <span class="text-danger">*</span></label>
                                    <input type="text" id="telepon" class="form-control" name="telepon" placeholder="Masukkan Nomor Telepon" value="<?= isset($data['siswa']) ? $data['siswa']['telepon'] : '' ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                    <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="5" placeholder="Masukkan Alamat"><?= isset($data['siswa']) ? $data['siswa']['alamat'] : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= url('/siswa') ?>" class="btn btn-light btn-sm border">Batal</a>
                        <button type="submit" class="btn btn-secondary btn-sm">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php require_once '../app/views/includes/script.php' ?>