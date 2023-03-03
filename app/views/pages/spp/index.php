<div class="container-fluid">

    <div class="d-flex justify-content-between">
        <div>
            <h1 class="h3 mb-3 text-gray-800">SPP Pembayaran</h1>
        </div>
        <div>
            <a href="<?= url('/spp/create') ?>" class="btn btn-sm btn-secondary">Tambah</a>
        </div>
    </div>
    <!-- Page Heading -->

    <?php Flasher::flash(function($flash) { ?>
        <div class="alert alert-<?= $flash['status'] == 'success' ? 'success' : 'danger' ?>" role="alert">
            <?= $flash['message'] ?>
        </div>
    <?php }) ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h6 class="m-0 font-weight-bold text-white">Data SPP</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tahun Ajaran</th>
                            <th>Nominal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['pembayaran'] as $pembayaran) { ?>
                            <tr>
                                <td><?= $pembayaran['tahun_ajaran'] ?></td>
                                <td><?= $pembayaran['nominal'] ?></td>
                                <td> 
                                    <a href="<?= url('/spp/edit/' . $pembayaran['id']) ?>" class="btn btn-sm btn-secondary"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= url('/spp/delete/' . $pembayaran['id']) ?>" class="btn btn-sm btn-secondary" onclick="return confirm('yakin ingin menghapus data ini?')"><i class="fas fa-fw fa-trash"></i></a>
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
        $('#dataTable').DataTable({
            columnDefs: [
                { targets: 2, width: '20%' }
            ]
        });
    })
</script>