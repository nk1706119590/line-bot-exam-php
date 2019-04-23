<?php
require "vendor/autoload.php";

$access_token = 'JOALJaFzXSS1/Iw0lRElqFUMiBHUF4LhFisSOpo9WpfG4Ju5l+o+o5yTWeYVIqOhwPafmf63J283XV1uMahQlwgdfCxzlKipJygVt7h4z9Fbt0mq+eQivXcy4jj4oyvvH8a6cp39m8SO/3I9OyLmVgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '7410da12768dbb3db2632dd64ed33a12';

$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$message = $arrayJson['events'][0]['message']['text'];

$id = $arrayJson['events'][0]['source']['userId'];

 if($message == "โปรไฟล์"){

        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("https://lilyforlisa.herokuapp.com/profile.php?id=".$id);
        $response1 = $bot->pushMessage($id, $textMessageBuilder);
 }





/*if($id != ""){
   echo "ไอดีเข้าจ้าาาาา";
}
else{
   echo "ไอดีไม่เข้าาาาาา ไปแก้ใหม่!!! ";
}*/
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


//echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
//echo $textMessageBuilder;
?>
