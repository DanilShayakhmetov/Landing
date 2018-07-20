<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19.07.18
 * Time: 23:13
 */

include ("getToken.php");


$curl = curl_init();
$key = get_Token();
$name = $_POST['name'];
$phone = $_POST['phone'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://alfashops.ru/scripts/test_task/api_sample.php",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 3000,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data;
     name=\"method\"\r\n\r\nsend_lead\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data;
     name=\"name\"\r\n\r\n".$name."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data;
     name=\"phone\"\r\n\r\n".$phone."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data;
     name=\"ip\"\r\n\r\n".$ip."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data;
     name=\"key\"\r\n\r\n".$key."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
        "postman-token: ff3fdc64-6269-7711-c368-e480f8c7c442"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}

