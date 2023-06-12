<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('template/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('template/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1">Sign In</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login to your account</p>
                <?php if (!empty(validation_errors())) : ?>
                <div class="alert alert-danger" role="alert">
                    <!-- <ul> -->
                    <?php foreach (validation_errors() as $error) : ?>
                    <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                    <!-- </ul> -->
                </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('msg_e')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('msg_e') ?>
                </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('msg_c')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('msg_c') ?>
                </div>
                <?php endif; ?>
                <form action="<?= base_url('auth/login') ?>" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email"
                            value="<?= old('email') ?>">
                        <div class=" input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            value="<?= old('password') ?>">
                        <div class=" input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <a href="<?= base_url('auth/register') ?>" class="text-center">I don't have an account</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url('template/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('template/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>