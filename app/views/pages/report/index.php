<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gotham SPP - Rincian Pembayaran Semester <?= isset($data['transaksi'][0]['tahun_ajaran']) ? $data['transaksi'][0]['tahun_ajaran'] : '-' ?></title>

    <link href="<?= asset('/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= asset('/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <link href="<?= asset('/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>
<body class="px-5 py-2">
    <h1 class="my-4 text-center">Rincian Pembayaran Semester <?= isset($data['transaksi'][0]['tahun_ajaran']) ? $data['transaksi'][0]['tahun_ajaran'] : '-' ?></h1>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Siswa</th>
                <th>SPP Pembayaran</th>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Tanggal Bayar</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['transaksi'] as $transaksi) { ?>
                <tr>
                    <td>
                        <?= $transaksi['siswa_nis'] ?> - 
                        <?= $transaksi['siswa_nama'] ?>
                    </td>
                    <td>
                        <?= $transaksi['tahun_ajaran'] ?>
                        (<?= $transaksi['nominal'] ?>)
                    </td>
                    <td><?= $transaksi['tahun_dibayar'] ?></td>
                    <td><?= date('F', mktime(0, 0, 0, $transaksi['bulan_dibayar'], 1,)) ?></td>
                    <td><?= isset($transaksi['tanggal_bayar']) ?  date('Y M d H:i:s A', strtotime($transaksi['tanggal_bayar']) + 60*60 ) : '-' ?></td>
                    <td><?= $transaksi['petugas_nama'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php require_once '../app/views/includes/script.php' ?>
    <script type="application/javascript">
        window.print();
    </script>
</body>
</html>