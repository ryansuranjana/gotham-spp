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

    <link href="<?= asset('/css/style.css') ?>" rel="stylesheet">

    <style>
        .bg-login-bat-image {
            background: url('<?= asset('/img/login.jpg') ?>');
            background-position: center;
            background-size: cover;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-bat-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang di Website Pembayaran SPP Gotham</h1>
                                    </div>
                                    <?php Flasher::flash(function($flash) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $flash['message'] ?>
                                        </div>
                                    <?php }) ?>
                                    <form class="user" action="<?= url('/auth/authenticated') ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" 
                                                placeholder="Enter Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" name="password">
                                        </div>
                                        <button class="btn btn-secondary btn-user btn-block" type="submit">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= asset('/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= asset('/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= asset('/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>