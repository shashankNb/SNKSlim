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
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/style.css'; ?>">
    <title>Administration Login</title>
</head>
<body class="body-login">
<section>
    <!-- Modal -->
    <div class="modal login-modal d-block" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content mb-3">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Forgot Password</h5>
                </div>
                <form action="#" method="post" name="resetForm" id="resetForm">
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
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="reset" class="btn btn-info">Get Password</button>
                    </div>
                </form>
            </div>
            <div class="forgot-password-help text-center">
                <span class="text-white">Forgot Password ? <a href="<?php echo BASE_URL . '/forgot.php'; ?>" class="text-black-50 text-decoration-none">Click Here to reset it</a></span>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo BASE_URL .'/assets/js/bootstrap.bundle.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL . '/assets/js/sha512.js'; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL . '/assets/js/form.js'; ?>"></script>
</body>
</html>
