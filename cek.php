<?php
error_reporting(E_ALL);
$api_key      = 'TVepUXt3OZdCijbMN6QGkyHW4FLKnrsgEI9qmuBo0vDc5xP1w87alRJfAS2h';
$game         = 'Mobile Legends';
$user_id      = '370028836';
$zone_id      = '9698';

$params = [
    'api_key' => $api_key,
    'game'    => $game,
    'user_id' => $user_id,
    'zone_id' => $zone_id
];

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,'https://api.zentopup.id/api/v1/check-game');
curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/x-www-form-urlencoded']);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($params));
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response);
echo $response;
?>