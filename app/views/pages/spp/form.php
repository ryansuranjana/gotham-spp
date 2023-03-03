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
            <form action="<?= isset($data['pembayaran']) ? url('/spp/update/' . $data['pembayaran']['id']) : url('/spp/store') ?>" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="tahun_ajaran">Tahun Ajaran <span class="text-danger">*</span></label>
                            <input type="text" id="tahun_ajaran" class="form-control" placeholder="Masukkan Tahun Ajaran" name="tahun_ajaran" value="<?= isset($data['pembayaran']) ? $data['pembayaran']['tahun_ajaran'] : '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nominal">Nominal <span class="text-danger">*</span></label>
                            <input type="number" id="nominal" class="form-control" placeholder="Masukkan Nominal Pembayaran" name="nominal" value="<?= isset($data['pembayaran']) ? $data['pembayaran']['nominal'] : '' ?>" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= url('/spp') ?>" class="btn btn-light btn-sm border">Batal</a>
                        <button type="submit" class="btn btn-secondary btn-sm">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php require_once '../app/views/includes/script.php' ?>