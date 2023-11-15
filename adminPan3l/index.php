<?php
    include_once "main.php";
    $objLogin->sec_session_start();
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administration Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/bower_components/fontawesome-free/css/all.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/bower_components/datatables-bs4/css/dataTables.bootstrap4.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/bower_components/datatables-responsive/css/responsive.bootstrap4.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/bower_components/datatables-buttons/css/buttons.bootstrap4.min.css'; ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/dist/css/adminlte.min.css'; ?>">

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
<body class="hold-transition sidebar-mini text-sm">
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-primary">
        <?php include_once "partials/header.php"; ?>
    </nav>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <?php include_once "partials/sidebar.php"; ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php
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
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <?php include_once "partials/footer.php"; ?>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo BASE_URL. '/assets/bower_components/jquery/jquery.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/bower_components/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL.'/assets/dist/js/adminlte.min.js'; ?>"></script>

<script src="<?php echo BASE_URL. '/assets/bower_components/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/bower_components/datatables-bs4/js/dataTables.bootstrap4.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/bower_components/datatables-responsive/js/dataTables.responsive.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/bower_components/datatables-responsive/js/responsive.bootstrap4.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/bower_components/datatables-buttons/js/dataTables.buttons.min.js'; ?>"></script>
<script src="<?php echo BASE_URL. '/assets/bower_components/datatables-buttons/js/buttons.bootstrap4.min.js'; ?>"></script>
<script src="<?php echo BASE_URL .'/ckeditor/ckeditor.js'; ?>"></script>
<script src="<?php echo BASE_URL .'/assets/dist/js/bootstrap-confirmation.js'; ?>"></script>
<script src="<?php echo BASE_URL .'/assets/dist/js/main.js'; ?>"></script>
<script>
    CKEDITOR.replace("editor", {
        extraPlugins: 'filebrowser',
        //filebrowserBrowseUrl: '<?php //echo BASE_URL. '/ckeditor/browse.php'; ?>//',
        filebrowserUploadUrl: '<?php echo BASE_URL. '/ckeditor/upload.php'; ?>',
    });

    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        // other options
    });

    $('#dataTable').DataTable({
        'paging'      : false,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : false
    })
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>