<?php
include('main.php');
$objLogin->sec_session_start();
if ($objLogin->login_check()) $obj->redirect('./');

if(isset($_POST['reset']) && isset($_POST['email']))
{
    global $con;

    $data = $obj->select('email, name','tbl_users','email = ?', array($_POST['email']));

    if(count($data) > 0) {

        $email = $data[0]->email;

        // $template = $obj->select('description','tbl_email_template','title = ?',array('Forgot Password'));

        $message =  "[(Username)] - [(New Password)]"; // $template[0]['description'];

        if($_POST['email'] == $email)
        {

            $sql = "	UPDATE	tbl_users
			
						SET		password = ?,
						
								salt = ?
						
						WHERE	email = ?	";

            $stmt = $con->prepare($sql);

            $stmt->fetch(PDO::FETCH_ASSOC);

            $password =  uniqid(time());

            $newPassword = $password;

            $subject = 'Password Reset';

            $headers = "From: ".$data[0]->email."\r\n";

            $headers .= "MIME-Version: 1.0\r\n";

            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $semi_rand = md5(time());

            $message = str_replace('[(Username)]', $data[0]->email, $message);

            echo $message = str_replace('[(New Password)]', $password, $message);

            $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

            $password = hash('sha512', $password);

            $password = hash('sha512', $password.$random_salt);

            //if($objMail->sendMail($_POST['email'],$subject,$message)==true)
            if(mail($data[0]->email,$subject,$message,$headers))
            {

                if($stmt->execute(
                    array(
                        $password,
                        $random_salt,
                        $_POST['email']
                    )
                ))
                    $msg =  'Password Has been rest. Check your Email';
                else
                    $msg =  'Certain Error has occurred';
            } else {
                $msg = 'Mail not sent.';
            }
        }
        else
        {
            $msg =  'Wrong Email Address !!!';
        }
    } else {
        $msg = "Email address not found";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administration | Forgot Password</title>
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
        <p class="login-box-msg">Reset Password</p>
        <form action="#" method="post" name="resetForm" id="resetForm">
            <?php if (isset($msg)): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <a href="<?php echo BASE_URL. '/login.php'; ?>" class="text-center">Back to Login</a>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="reset" class="btn btn-primary btn-block btn-flat">Reset</button>
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
<!-- iCheck -->
<script src="<?php echo BASE_URL. '/assets/dist/js/form.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/dist/js/sha512.js'; ?>"></script>
</body>
</html>
