<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19.07.18
 * Time: 21:24
 */

$user = array(
    'name'=> 'dick',
);
$json = $user;
$json = json_encode($json);
echo $json;