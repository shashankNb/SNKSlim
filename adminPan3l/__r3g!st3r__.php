<?php

include_once("main.php");

$objLogin->sec_session_start();

if ($objLogin->login_check()) $obj->redirect('./');

$objLogin = new Login();

if(isset($_POST['email']) && $_POST['email'] != "")
{
    global $con;

    $email = $_POST['email'];

    $data = $obj->select('email','tbl_users','email = ?', array($email));

    if (count($data) == 0) {
        $password = $_POST['id'];

        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

        $password = hash('sha512', $password.$random_salt);

        $sql = "INSERT INTO tbl_users";
        $sql .= "(email,password,salt,access)";
        $sql .= "VALUES";
        $sql .= "(?,?,?,?)";

        $stm = $con->prepare($sql);

        $stm->execute(array($email,$password,$random_salt,1));

        $obj->redirect('login.php?err=2');
    } else {
        $msg = 'Email already exists';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo BASE_URL .'/assets/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL .'/assets/css/style.css'; ?>" />
    <title>Register</title>
</head>
<body class="body-login">
<section>
    <div class="modal login-modal d-block" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content mb-3">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">Register to Web App</h5>
                    </div>
                    <div class="modal-body">
                        <?php if (isset($msg)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-times-circle text-danger"></i> <strong>Error</strong><br>
                                <?php echo $msg; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required/>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required/>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" onclick="check(this.form, this.form.password)">Register</button>
                    </div>
                </form>
            </div>
            <div class="forgot-password-help text-center">
                <span class="text-white">Forgot Password ? <a href="<?php echo BASE_URL . '/recover.php'; ?>" class="text-black-50 text-decoration-none">Click Here to reset it</a></span>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?php echo BASE_URL . '/assets/js/bootstrap.bundle.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL . '/assets/js/sha512.js'; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL . '/assets/js/form.js'; ?>"></script>
</body>
</html>
