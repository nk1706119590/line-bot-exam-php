<?php

require "vendor/autoload.php";

$access_token = 'JOALJaFzXSS1/Iw0lRElqFUMiBHUF4LhFisSOpo9WpfG4Ju5l+o+o5yTWeYVIqOhwPafmf63J283XV1uMahQlwgdfCxzlKipJygVt7h4z9Fbt0mq+eQivXcy4jj4oyvvH8a6cp39m8SO/3I9OyLmVgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '7410da12768dbb3db2632dd64ed33a12';

$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

    $serverName="1.179.246.109";
    $userName="root";
    $userPassword="cctsssystem";
    $dbName="db_uuline_test";

    $con = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    $query = "SELECT user_id FROM register" or die("Error:" . mysqli_error()); 

    $result = mysqli_query($con, $query); 


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$response = $bot->getProfile($query);
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo "UserID : " .$profile['userId']."<br>";
    echo "Name : " .$profile['displayName']."<br>";
    echo "Pic : " .$profile['pictureUrl']."<br>";
    echo "Status : " .$profile['statusMessage'];
      
}
?>






