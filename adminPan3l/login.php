<?php
    include("main.php");
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
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo BASE_URL. '/assets/bower_components/bootstrap/dist/css/bootstrap.min.css'; ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL. '/assets/bower_components/font-awesome/css/font-awesome.min.css'; ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo BASE_URL. '/assets/bower_components/Ionicons/css/ionicons.min.css'; ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_URL. '/assets/dist/css/AdminLTE.min.css'; ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo BASE_URL. '/assets/plugins/iCheck/square/blue.css'; ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="process.php" method="post">
            <?php if (isset($_GET['err']) && $_GET['err'] == 1): ?>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                    <h4><i class="icon fa fa-info"></i> Alert!</h4>
                    Enter correct username and password
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['err']) && $_GET['err'] == 2): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    Registration success. Please login
                </div>
            <?php endif; ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember_me"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="button" onclick="check(this.form, this.form.password)" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="<?php echo BASE_URL . '/recover.php'; ?>">I forgot my password</a><br>
        <a href="<?php echo BASE_URL.'/__r3g!st3r__.php'; ?>" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo BASE_URL. '/assets/bower_components/jquery/dist/jquery.min.js'; ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo BASE_URL. '/assets/bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>
<!-- iCheck -->
<script src="<?php echo BASE_URL. '/assets/plugins/iCheck/icheck.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/dist/js/form.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/dist/js/sha512.js'; ?>"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
