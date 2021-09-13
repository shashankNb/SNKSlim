<?php

{
    try {
        $con = new PDO(
            "mysql:host=" . HOST . ";dbname=" . DB . ";",
            USER,
            PWD
        );

        $con->query("SET NAMES 'utf8'");

        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        error_log($e->getMessage());

        die("A database error was encountered");
    }
}
