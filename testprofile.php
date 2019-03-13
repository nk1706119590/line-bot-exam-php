<?php

$httpClient = new CurlHTTPClient('<dr0CTYutcnUKHQSfdWOv9yMQI1F3HljZfcHcIedbCuFft8kMzH7fGbaMspAqand3KD2bN2TqqubE1sYvCDGDDBrX3cDJ6lGdGZoFxoajJnBKsh+K4tz/fsflL71LpZ/fdXWg5ar7ppN8ycx1vUUKOwdB04t89/1O/w1cDnyilFU=>');
$bot = new LINEBot($httpClient, array('channelSecret' => '<c70f0350f357af8e48b1d407eaf05db1>'));

$response = $bot->getProfile('<U04116f129718a17c788ee0654836a813>');
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo $profile['displayName'];
    echo $profile['pictureUrl'];
    echo $profile['statusMessage'];
} 

?>
