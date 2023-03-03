<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['page_title'] ?></h1>

    <?php Flasher::flash(function($flash) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $flash['message'] ?>
        </div>
    <?php }) ?>

    <div class="row">
        <div class="col-md-6 col-12">
            <form action="<?= isset($data['kelas']) ? url('/kelas/update/' . $data['kelas']['id']) : url('/kelas/store') ?>" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name">Nama Kelas <span class="text-danger">*</span></label>
                            <input type="text" id="name" class="form-control" name="nama" value="<?= isset($data['kelas']) ? $data['kelas']['nama'] : '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="kompetensi_keahlian">Kompetensi Keahlian <span class="text-danger">*</span></label>
                            <input type="text" id="kompetensi_keahlian" class="form-control" name="kompetensi_keahlian" value="<?= isset($data['kelas']) ? $data['kelas']['kompetensi_keahlian'] : '' ?>" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= url('/kelas') ?>" class="btn btn-light btn-sm border">Batal</a>
                        <button type="submit" class="btn btn-secondary btn-sm">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php require_once '../app/views/includes/script.php' ?>