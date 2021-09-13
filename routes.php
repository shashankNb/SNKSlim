<?php

$objSlug = new Slug();
$slug = $objSlug->send_slug();

$slug_url = $slug == "" ? '' : (is_array($slug) ? $slug['id'] : $slug);
if ($slug_url == '' || !isset($slug_url) || $slug_url == 'home') {
    include_once "views/home.php";
} else {
    include_once "views/404.php";
}
