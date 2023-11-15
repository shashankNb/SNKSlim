<?php


require "main.php";

use Faker\Factory;

if (isset($_GET['fake']) && $_GET['fake'] == 'user') {

    $users = [];

    $faker = Factory::create();

    for($i=0; $i<1; $i++) {

        $password = 'password';

        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

        $password = hash('sha512', $password . $random_salt);

        $data = [
            'name' => $faker->name,
            'email' => $faker->safeEmail,
            'password' => $password,
            'salt' => $random_salt,
            'access' => 1,
            'status' => true
        ];
        $obj->insert('tbl_users', $data);
    }
}