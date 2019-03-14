<?php

require "vendor/autoload.php";

$access_token = 'dr0CTYutcnUKHQSfdWOv9yMQI1F3HljZfcHcIedbCuFft8kMzH7fGbaMspAqand3KD2bN2TqqubE1sYvCDGDDBrX3cDJ6lGdGZoFxoajJnBKsh+K4tz/fsflL71LpZ/fdXWg5ar7ppN8ycx1vUUKOwdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'c70f0350f357af8e48b1d407eaf05db1';

$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$id = $arrayJson['events'][0]['source']['userId'];

if(.$id != ""){
   echo "ไอดีเข้าจ้าาาาา";
}
else{
   echo "ไอดีไม่เข้าาาาาา ไปแก้ใหม่!!! ";
}
//echo $id;
/*$response = $bot->getProfile($id);
echo "Respone" .$response;
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo "UserID : " .$profile['userId']."<br>";
    echo "Name : " .$profile['displayName']."<br>";
    echo "Pic : " .$profile['pictureUrl']."<br>";
    echo "Status : " .$profile['statusMessage'];
      
}*/


$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("https://lilyforlisa.herokuapp.com/botpush.php?id=".$id);
$response1 = $bot->pushMessage($id, $textMessageBuilder);
//echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
//echo $textMessageBuilder;

?>
