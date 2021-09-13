<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/style.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/plugins/datatable/datatables.min.css'; ?>">
    <title>Administration Panel</title>
</head>
<body>

<div class="container-fluid px-0">
    <div class="top-block">
        <div class="d-block float-start">
            <span><strong><i class="fa fa-caret-left me-2"></i></strong> Project: <strong><?php echo SITE_NAME; ?></strong></span>
        </div>
        <div class="d-block float-end">
            <span class="m-lg-2"><i class="fa fa-user-alt text-warning"></i> <strong>Shashank Bhattarai (Admin) </strong></span>
            <a href="<?php echo BASE_URL . '/logout.php'; ?>"><i class="fa fa-sign-out text-info"></i> <strong>Logout</strong></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
