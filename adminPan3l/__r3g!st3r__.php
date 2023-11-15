<?php

include_once("main.php");

$objLogin->sec_session_start();

if ($objLogin->login_check()) $obj->redirect('./');

$objLogin = new Login();

if (isset($_POST['email']) && $_POST['email'] != "" && $_POST['name'] != "") {

    global $con;

    $email = $_POST['email'];

    $name = $_POST['name'];

    $data = $obj->select('email', 'tbl_users', 'email = ?', array($email));

    if (count($data) == 0) {
        $password = $_POST['id'];

        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

        $password = hash('sha512', $password . $random_salt);

        $sql = "INSERT INTO tbl_users";
        $sql .= "(name, email, password, salt, access, status)";
        $sql .= "VALUES";
        $sql .= "(?,?,?,?,?,?)";

        $stm = $con->prepare($sql);

        $stm->execute(array($name, $email, $password, $random_salt, 1, 0));

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
    <meta name="ROBOTS" content="NOFOLLOW, NOINDEX"/>
    <!-- font awesome free 5-->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/bower_components/fontawesome-free/css/all.min.css'; ?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL. '/assets/dist/css/AdminLTE.min.css'; ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page text-sm">
<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="#" method="post" onsubmit="return check(this, this.password)">
                <div class="input-group mb-3">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-8 col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>
            <a href="<?php echo BASE_URL. '/login.php'; ?>">I already have a membership</a>
        </div>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script src="<?php echo BASE_URL. '/assets/bower_components/jquery/jquery.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/bower_components/bootstrap/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo BASE_URL.'/assets/dist/js/adminlte.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/dist/js/form.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/dist/js/sha512.js'; ?>"></script>
</body>
</html>

