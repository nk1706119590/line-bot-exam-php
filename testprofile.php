<?php

require "vendor/autoload.php";

$accessToken = "dr0CTYutcnUKHQSfdWOv9yMQI1F3HljZfcHcIedbCuFft8kMzH7fGbaMspAqand3KD2bN2TqqubE1sYvCDGDDBrX3cDJ6lGdGZoFxoajJnBKsh+K4tz/fsflL71LpZ/fdXWg5ar7ppN8ycx1vUUKOwdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
$channelSecret = 'c70f0350f357af8e48b1d407eaf05db1';

$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

$id = $arrayJson['events'][0]['source']['userId'];

if($id != null){
   echo "ไอดีเข้าจ้าาาาา";
}
else{
   echo "ไอดีไม่เข้าาาาาา ไปแก้ใหม่!!! ";
}


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);


$response = $bot->getProfile($id);
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo "UserID : " .$profile['userId']."<br>";
    echo "Name : " .$profile['displayName']."<br>";
    echo "Pic : " .$profile['pictureUrl']."<br>";
    echo "Status : " .$profile['statusMessage'];
      
}
  

?>
