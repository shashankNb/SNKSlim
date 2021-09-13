<?php
include('main.php');

if(isset($_POST['email']))
{
    $objLogin->sec_session_start();

    echo 'Please Wait.....';

    if($objLogin->checkUser($_POST['email'], $_POST['id']))
    {
        $obj->redirect(BASE_URL);
    }
    else
    {
        $obj->redirect('login.php?err=1');
    }
} else {
    $obj->redirect('login.php');
}
?>
