<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 mb-2 text-gray-800"><?= $data['page_title'] ?></h1>
    </div>

    <div class="row">
        <div class="col-md-5 col-12">
            <?php Flasher::flash(function($flash) { ?>
                <div class="alert <?= $flash['status'] == 'success' ? 'alert-success' : 'alert-danger' ?>" role="alert">
                    <?= $flash['message'] ?>
                </div>
            <?php }) ?>
            <form action="<?= url('/resetpassword/update') ?>" method="post">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="old_password"><span class="text-danger">*</span> Password Lama</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" required>
                        </div>
                        <div class="mb-2">
                            <label for="password"><span class="text-danger">*</span> Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-secondary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../app/views/includes/script.php' ?>