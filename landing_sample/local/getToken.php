<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19.07.18
 * Time: 21:02
 */

function get_Token()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://alfashops.ru/scripts/test_task/api_sample.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"method\"\r\n\r\nget_api_key\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        $errLog = "cURL Error #:" . $err;
        return $errLog;
    } else {
        echo $response;
    }
}