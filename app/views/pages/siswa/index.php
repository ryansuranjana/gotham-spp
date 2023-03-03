<div class="container-fluid">

    <div class="d-flex justify-content-between">
        <div>
            <h1 class="h3 mb-3 text-gray-800">Siswa</h1>
        </div>
        <div>
            <a href="<?= url('/siswa/create') ?>" class="btn btn-sm btn-secondary">Tambah</a>
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
            <h6 class="m-0 font-weight-bold text-white">Data Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['siswa'] as $siswa) { ?>
                            <tr>
                                <td><?= $siswa['nis'] ?></td>
                                <td><?= $siswa['nama'] ?></td>
                                <td>
                                    <?= $siswa['kelas_nama'] ?>
                                    <?= $siswa['kelas_kompetensi_keahlian'] ?>
                                </td>
                                <td> 
                                    <a href="<?= url('/siswa/show/' . $siswa['id']) ?>" class="btn btn-sm btn-secondary"><i class="fas fa-fw fa-eye"></i></a>
                                    <a href="<?= url('/siswa/edit/' . $siswa['id']) ?>" class="btn btn-sm btn-secondary"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= url('/siswa/delete/' . $siswa['id']) ?>" class="btn btn-sm btn-secondary" onclick="return confirm('yakin ingin menghapus data ini?')"><i class="fas fa-fw fa-trash"></i></a>
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
                { targets: 3, width: '20%' }
            ]
        });
    })
</script>