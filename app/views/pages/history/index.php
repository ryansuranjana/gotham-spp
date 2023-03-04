<div class="container-fluid">

    <div class="d-flex justify-content-between">
        <div>
            <h1 class="h3 mb-5 text-gray-800">History Transaksi</h1>
        </div>
        <div>
            <?php if($_SESSION['user']['role'] == 'admin') { ?>
                <a href="<?= url('/laporan') ?>" target="_blank" id="btn-laporan" class="btn btn-sm btn-secondary">Generate Laporan</a>
            <?php } ?>
        </div>
    </div>
    <!-- Page Heading -->
    
    <?php if($_SESSION['user']['role'] != 'siswa') { ?>
        <div class="row justify-content-center mb-2">
            <div class="col-md-6 col-12">
                <form id="form-search">
                    <div class="input-group mb-3">
                        <select name="" id="tahun-ajaran-input" class="form-control">
                            <option disabled selected value="">Cari tahun ajaran</option>
                            <?php foreach($data['pembayaran'] as $pembayaran) { ?>
                                <option value="<?= $pembayaran['id'] ?>"><?= $pembayaran['tahun_ajaran'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h6 class="m-0 font-weight-bold text-white">Data History Transaksi</h6>
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
                            <th>Petugas</th>
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
                                <td><?= $transaksi['petugas_nama'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php require_once '../app/views/includes/script.php' ?>
<?php if($_SESSION['user']['role'] != 'siswa') { ?>
    <script type="application/javascript">
        $(document).ready(function() {
            let datatable = $('#dataTable').DataTable({
                destroy: true
            });
            const transaksi = JSON.parse('<?= json_encode($data['transaksi']) ?>');
            const url = '<?= url('/laporan') ?>';
            const generateMonth = (month) => {
                $result = ''
                switch (month) {
                    case '1':
                        $result = 'Januari'
                        break;
                    case '2':
                        $result = 'Februari'
                        break;
                    case '3':
                        $result = 'Maret'
                        break;
                    case '4':
                        $result = 'April'
                        break;
                    case '5':
                        $result = 'Mei'
                        break;
                    case '6':
                        $result = 'Juni'
                        break;
                    case '7':
                        $result = 'Juli'
                        break;
                    case '8':
                        $result = 'Agustus'
                        break;
                    case '9':
                        $result = 'September'
                        break;
                    case '10':
                        $result = 'Oktober'
                        break;
                    case '11':
                        $result = 'Nopember'
                        break;
                    case '12':
                        $result = 'Desember'
                        break;
                }
                return $result
            }

            $('#form-search').on('submit', function(e) {
                e.preventDefault();

                const transkasiFitler = transaksi.filter((row) => row.pembayaran_id == $('#tahun-ajaran-input').find(':selected').val());
                
                if(transaksi.length > 0 ) {
                    datatable.destroy();
                    $('#tbody').html(' ');
                    transkasiFitler.forEach(transaksi => {
                        $('#tbody').append(`
                            <tr>
                                <td>${transaksi['siswa_nis'] } - ${transaksi['siswa_nama']}</td>
                                <td>${ transaksi['tahun_ajaran'] } (${ transaksi['nominal'] })</td>
                                <td>${ transaksi['tahun_dibayar'] }</td>
                                <td>${ generateMonth(transaksi['bulan_dibayar']) } </td>
                                <td>${ transaksi['tanggal_bayar']}</td>
                                <td>${ transaksi['petugas_nama'] }</td>
                            </tr>
                        `)
                    });
                    datatable = $('#dataTable').DataTable({
                        destroy: true
                    });
                }
                $('#btn-laporan').attr('href', url + '/' + $('#tahun-ajaran-input').find(':selected').val());
            })

        })
    </script>
<?php } else { ?>
    <script type="application/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable();
        })
    </script>
<?php } ?>
