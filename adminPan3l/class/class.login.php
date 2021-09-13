<?php

class Login extends Functions
{
    public $obj;

    function Login()
    {
        $this->obj = new Functions();
    }

    function sec_session_start()
    {
        $session_name = 'sec_session_id';

        $secure = false;

        $httponly = true;

        ini_set('session.use_only_cookies', 1);

        $cookieParams = session_get_cookie_params();

        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

        session_name($session_name);

        session_start();

        //session_regenerate_id(true);

        ob_start();
    }

    function checkUser($user, $password)
    {
        global $con;

        if ($stm = $con->prepare("SELECT id, email, password, salt, access FROM tbl_users WHERE email = ? LIMIT 1")) {

            $stm->execute(array($user));

            $data = $stm->fetchAll(PDO::FETCH_CLASS);


            if (count($data) > 0) {

                $password = hash('sha512', $password . $data[0]->salt);

                $dbPassword = $data[0]->password;

                if ($password == $dbPassword) {

                    $ip_address = $_SERVER['REMOTE_ADDR'];

                    $user_browser = $_SERVER['HTTP_USER_AGENT'];

                    $user_id = preg_replace("/[^0-9]+/", "", $data[0]->id);

                    $_SESSION['user_ko_id'] = $user_id;

                    $_SESSION['email'] = $data[0]->email;

                    $_SESSION['user_ko_access'] = $data[0]->access;

                    $_SESSION['login_string'] = hash('sha512', $password . $ip_address . $user_browser);

                    echo '<br>Email = '.$_SESSION['email'];

                    // exit;

                    return (true);
                } else {
                    return (false);
                }
            } else {
                return false;
            }

        }
    }


    function login_check()
    {
        global $con;

        //echo '<br>User Id = '.$_SESSION['id'];

        //echo '<br>Email = '.$_SESSION['email'];

        //die();

        if (isset($_SESSION['user_ko_id'], $_SESSION['email'], $_SESSION['login_string'])) {
            $user_id = $_SESSION['user_ko_id'];

            $login_string = $_SESSION['login_string'];

            $email = $_SESSION['email'];

            $ip_address = $_SERVER['REMOTE_ADDR'];

            $user_browser = $_SERVER['HTTP_USER_AGENT'];

            if ($stm = $con->prepare("SELECT password FROM tbl_users WHERE id = ? LIMIT 1")) {

                $stm->execute(array($user_id));

                if ($stm->rowCount() == 1) {
                    return true;
                } else {
                    return false;
                }
            } else {

                return false;
            }
        } else {

            return false;
        }
    }

    function logout()
    {
        $params = session_get_cookie_params();

        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

        session_destroy();

        header('Location: login.php');
    }


}
