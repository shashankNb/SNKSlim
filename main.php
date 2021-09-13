<?php

ini_set('memory_limit', '96M');
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');

require_once "vendor/autoload.php";
require_once "database/constants.php";
require_once "database/query.php";

class Slug
{
    function send_slug()
    {
        $request = $_SERVER['QUERY_STRING'];
        if ($request == "") {
            return "";
        } else {
            $parsed = explode('&', $request);
            array_shift($parsed);
            foreach ($parsed as $argument) {
                $temp = explode('=', $argument);
                $getVars[$temp[0]] = $temp[1];
            }

            if (isset($getVars)) {
                if (is_array($getVars)) {
                    $getVars['slug'] = $getVars['id'];
                }
            } else {
                $getVars = $request;
            }
            return $getVars;
        }
    }
}
