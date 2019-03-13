<?php



require "vendor/autoload.php";

$access_token = 'dr0CTYutcnUKHQSfdWOv9yMQI1F3HljZfcHcIedbCuFft8kMzH7fGbaMspAqand3KD2bN2TqqubE1sYvCDGDDBrX3cDJ6lGdGZoFxoajJnBKsh+K4tz/fsflL71LpZ/fdXWg5ar7ppN8ycx1vUUKOwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'c70f0350f357af8e48b1d407eaf05db1';

$content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
  
$arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   
$message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   
$id = $arrayJson['events'][0]['source']['userId'];



$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($arrayHeader);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);


$response = $bot->getProfile($id);
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo "UserID : " .$profile['userId']."<br>";
    echo "Name : " .$profile['displayName']."<br>";
    echo "Pic : " .$profile['pictureUrl']."<br>";
    echo "Status : " .$profile['statusMessage'];
      
}

//$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
//$response = $bot->pushMessage($pushID, $textMessageBuilder);

//echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







