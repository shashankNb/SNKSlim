<?php include_once "main.php"; ?>
<?php include_once "partials/header.php"; ?>
<div class="container-fluid bottom-block">
    <div class="row">
        <aside class="col-md-2">
            <?php include_once "partials/sidebar.php"; ?>
        </aside>
        <main class="col-md-10">
            <div class="content">
                <?php
                $objLogin->sec_session_start();
                if ($objLogin->login_check()) {
                    $pg = isset($_GET['pg']) ? $_GET['pg'] : 'dashboardManage';
                    if (is_file('views/' . $pg . '.php'))
                        include_once('views/' . $pg . '.php');
                    else
                        include_once('views/404.php');
                } else {
                    echo 'session error';
                    header('Location:login.php');
                }
                ?>
            </div>
        </main>
    </div>
</div>
<?php include_once "partials/footer.php"; ?>
