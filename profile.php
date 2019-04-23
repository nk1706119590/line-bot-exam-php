<?php

require "vendor/autoload.php";

$access_token = 'JOALJaFzXSS1/Iw0lRElqFUMiBHUF4LhFisSOpo9WpfG4Ju5l+o+o5yTWeYVIqOhwPafmf63J283XV1uMahQlwgdfCxzlKipJygVt7h4z9Fbt0mq+eQivXcy4jj4oyvvH8a6cp39m8SO/3I9OyLmVgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '7410da12768dbb3db2632dd64ed33a12';

$content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);

//$id = $arrayJson['events'][0]['source']['userId'];
$id = 'U633040010603551b111b2e3900ff1135';

//$id = $_GET["id"];

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
/*$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($id);
$response = $bot->pushMessage($id, $textMessageBuilder);*/
//echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

/*<?php

$access_token = 'dr0CTYutcnUKHQSfdWOv9yMQI1F3HljZfcHcIedbCuFft8kMzH7fGbaMspAqand3KD2bN2TqqubE1sYvCDGDDBrX3cDJ6lGdGZoFxoajJnBKsh+K4tz/fsflL71LpZ/fdXWg5ar7ppN8ycx1vUUKOwdB04t89/1O/w1cDnyilFU=';
$cs ='c70f0350f357af8e48b1d407eaf05db1';

$content = file_get_contents('php://input');
$events = json_decode($content, true);

$userId = 'U5e9acf1216646459855f5735a974b170 ';

$url = 'https://api.line.me/v2/bot/profile/'. $userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;*/






