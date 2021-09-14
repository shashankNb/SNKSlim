<?php
//    error_reporting(E_ALL & ~E_NOTICE);
//    error_reporting( 0 );
//    set_time_limit ( 0 );
    ini_set('memory_limit', '96M');
    ini_set('post_max_size', '64M');
    ini_set('upload_max_filesize', '64M');

    require_once("../vendor/autoload.php");
    include_once("../database/constants.php");
    include_once("./config/connect.php");
    include_once("./class/class.query.php");
    include_once("./class/class.functions.php");
    include_once("./class/class.columns.php");
    include_once("./class/class.params.php");
    include_once("./class/class.params.php");
    include_once("./class/class.datatable.php");
    include_once("./class/class.login.php");
    include_once("./class/class.pagination.php");

    $obj = new Functions();
    $objLogin = new Login();
