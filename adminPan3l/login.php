<?php
    require "main.php";
    $objLogin->sec_session_start();
    if ($objLogin->login_check()) $obj->redirect('./');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administration | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="ROBOTS" content="NOFOLLOW, NOINDEX" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/bower_components/fontawesome-free/css/all.min.css'; ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_URL. '/assets/dist/css/AdminLTE.min.css'; ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo BASE_URL. '/assets/plugins/iCheck-bootstrap/icheck-bootstrap.css'; ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page text-sm">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="process.php" method="post" onsubmit="return check(this, this.password);">
                <?php if (isset($_GET['err']) && $_GET['err'] == 1): ?>
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-info"></i> Alert!</h4>
                        Enter correct username and password
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['err']) && $_GET['err'] == 2): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                        Registration success. Please login
                    </div>
                <?php endif; ?>
                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" class="form-control <?php echo isset($_GET['err']) && $_GET['err'] == 1 ? 'is-invalid': ''; ?>" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <span class="error invalid-feedback"> Please Enter a correct email address</span>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control <?php echo isset($_GET['err']) && $_GET['err'] == 1 ? 'is-invalid': ''; ?>" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                        <span class="error invalid-feedback"> Please enter correct password</span>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember_me">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="<?php echo BASE_URL . '/recover.php'; ?>">I forgot my password</a><br>
            <a href="<?php echo BASE_URL.'/__r3g!st3r__.php'; ?>" class="text-center">Register a new membership</a>

        </div>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo BASE_URL. '/assets/bower_components/jquery/jquery.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/bower_components/bootstrap/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo BASE_URL.'/assets/dist/js/adminlte.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/dist/js/form.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/dist/js/sha512.js'; ?>"></script>
</body>
</html>
