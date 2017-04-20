<?php

$apiKey = $_POST['apiKey'];
$listId = $_POST['listId'];
$email = $_POST['email'];

//$apiKey = 'b43490070cea46b89f239bfe8ea4e121-us12';
//$listId = 'd8c75a66c6';
//$email = 'aqib1952+1@gmail.com';
$status = 'subscribed';

$apiURL = 'https://us12.api.mailchimp.com/3.0/lists/'.$listId.'/members';

$curl = curl_init($apiURL);

$curl_post_request_data = array(
    'email_address'         => $email,
    'status'                => $status
);

$curl_http_header = array(
    'Authorization: apikey '.$apiKey,
    'content-type: application/json'
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $curl_http_header);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_request_data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

curl_close($curl);

echo json_encode($result);

?>