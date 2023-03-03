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
            <form action="<?= isset($data['petugas']) ? url('/petugas/update/' . $data['petugas']['id']) : url('/petugas/store') ?>" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama">Nama <span class="text-danger">*</span></label>
                            <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama" name="nama" value="<?= isset($data['petugas']) ? $data['petugas']['nama'] : '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password Akun <span class="text-danger"><?= isset($data['petugas']) ? '' : '*' ?></span></label>
                            <input type="password" id="password" class="form-control" placeholder="Masukkan Password Akun" name="password" <?= isset($data['petugas']) ? '' : 'required' ?>>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="role" name="role" <?= isset($data['petugas']) && $data['petugas']['pengguna_role'] == 'admin' ? 'checked' : '' ?> >
                                <label class="form-check-label" for="role">Admin?</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= url('/petugas') ?>" class="btn btn-light btn-sm border">Batal</a>
                        <button type="submit" class="btn btn-secondary btn-sm">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php require_once '../app/views/includes/script.php' ?>