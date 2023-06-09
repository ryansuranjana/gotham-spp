<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $_ENV['APP_NAME'] ?> - <?= $data['page_title'] ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= asset('/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= asset('/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <link href="<?= asset('/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

    <link href="<?= asset('/css/style.css') ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once '../app/views/includes/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once '../app/views/includes/navbar.php' ?>
                <!-- End of Topbar -->