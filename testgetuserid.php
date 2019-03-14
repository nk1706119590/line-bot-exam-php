<?php

require "vendor/autoload.php";

$access_token = 'dr0CTYutcnUKHQSfdWOv9yMQI1F3HljZfcHcIedbCuFft8kMzH7fGbaMspAqand3KD2bN2TqqubE1sYvCDGDDBrX3cDJ6lGdGZoFxoajJnBKsh+K4tz/fsflL71LpZ/fdXWg5ar7ppN8ycx1vUUKOwdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'c70f0350f357af8e48b1d407eaf05db1';

$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

if($arrayJson != null){
  $replyToken = $arrayJson['events'][0]['replyToken'];
}

$textMessageBuilder = new TextMessageBuilder(json_encode($arrayJson));

$response = $bot->replyMessage($replyToken,$textMessageBuilder);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}
//$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
//$response = $bot->pushMessage($pushID, $textMessageBuilder);
//echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
