<?php

$headers = array('Content-Type: application/json', 'Authorization: Bearer <dr0CTYutcnUKHQSfdWOv9yMQI1F3HljZfcHcIedbCuFft8kMzH7fGbaMspAqand3KD2bN2TqqubE1sYvCDGDDBrX3cDJ6lGdGZoFxoajJnBKsh+K4tz/fsflL71LpZ/fdXWg5ar7ppN8ycx1vUUKOwdB04t89/1O/w1cDnyilFU=>');
$ch = curl_init('https://api.line.me/v2/bot/profile/<U5e9acf1216646459855f5735a974b170>');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$profile_json = curl_exec($ch);
$profile_array = json_decode($profile_json, true);

print_r($profile_array);
curl_close($ch);

?>
