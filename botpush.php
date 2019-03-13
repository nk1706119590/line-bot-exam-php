<?php



require "vendor/autoload.php";

$access_token = 'dr0CTYutcnUKHQSfdWOv9yMQI1F3HljZfcHcIedbCuFft8kMzH7fGbaMspAqand3KD2bN2TqqubE1sYvCDGDDBrX3cDJ6lGdGZoFxoajJnBKsh+K4tz/fsflL71LpZ/fdXWg5ar7ppN8ycx1vUUKOwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'c70f0350f357af8e48b1d407eaf05db1';

$pushID = 'U5e9acf1216646459855f5735a974b170';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);


$response = $bot->getProfile($pushID);
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo "UserID : \n" .$profile['userId'];
    echo "Name : \n" .$profile['displayName'];
    echo $profile['pictureUrl'];
    echo $profile['statusMessage'];
}


//$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
//$response = $bot->pushMessage($pushID, $textMessageBuilder);

//echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







