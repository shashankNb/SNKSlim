<?php

include_once("main.php");

$objLogin->sec_session_start();

if ($objLogin->login_check()) $obj->redirect('./');

$objLogin = new Login();

if(isset($_POST['email']) && $_POST['email'] != "" && $_POST['name'] != "")
{
    global $con;

    $email = $_POST['email'];

    $name = $_POST['name'];

    $data = $obj->select('email','tbl_users','email = ?', array($email));

    if (count($data) == 0) {
        $password = $_POST['id'];

        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

        $password = hash('sha512', $password.$random_salt);

        $sql = "INSERT INTO tbl_users";
        $sql .= "(name, email, password, salt, access)";
        $sql .= "VALUES";
        $sql .= "(?,?,?,?,?)";

        $stm = $con->prepare($sql);

        $stm->execute(array($name, $email,$password,$random_salt,1));

        $obj->redirect('login.php?err=2');
    } else {
        $msg = 'Email already exists';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administration | Register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="ROBOTS" content="NOFOLLOW, NOINDEX" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/bower_components/bootstrap/dist/css/bootstrap.min.css'; ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/bower_components/font-awesome/css/font-awesome.min.css'; ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/bower_components/Ionicons/css/ionicons.min.css'; ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/dist/css/AdminLTE.min.css'; ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="#" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="name" id="name" class="form-control" placeholder="Full name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <a href="<?php echo BASE_URL. '/login.php'; ?>" class="text-center">I already have a membership</a>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="button" onclick="check(this.form, this.form.password)" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo BASE_URL.'/assets/bower_components/jquery/dist/jquery.min.js'; ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo BASE_URL.'/assets/bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/dist/js/form.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/dist/js/sha512.js'; ?>"></script>
</body>
</html>

