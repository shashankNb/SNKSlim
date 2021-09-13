<?php

require_once "main.php";

switch(ADMIN_ONLY) {
    case true:
        $obj->redirect(BASE_URL);
        break;
    default:
        include_once("routes.php");
}
