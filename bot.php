<?php
  // กรณีต้องการตรวจสอบการแจ้ง error ให้เปิด 3 บรรทัดล่างนี้ให้ทำงาน กรณีไม่ ให้ comment ปิดไป
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // include composer autoload
  require "vendor/autoload.php";

  // การตั้งเกี่ยวกับ bot
  require 'bot_settings.php';
$access_token = 'JOALJaFzXSS1/Iw0lRElqFUMiBHUF4LhFisSOpo9WpfG4Ju5l+o+o5yTWeYVIqOhwPafmf63J283XV1uMahQlwgdfCxzlKipJygVt7h4z9Fbt0mq+eQivXcy4jj4oyvvH8a6cp39m8SO/3I9OyLmVgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '7410da12768dbb3db2632dd64ed33a12';


  // เชื่อมต่อกับ LINE Messaging API
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

  // คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
  $content = file_get_contents('php://input');

  // แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array
  $events = json_decode($content, true);
  if(!is_null($events)){
      // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
      $replyToken = $events['events'][0]['replyToken'];
  }
  // ส่วนของคำสั่งจัดเตียมรูปแบบข้อความสำหรับส่ง
  $textMessageBuilder = new TextMessageBuilder(json_encode($events));

  //l ส่วนของคำสั่งตอบกลับข้อความ
  $response = $bot->replyMessage($replyToken,$textMessageBuilder);
  if ($response->isSucceeded()) {
      echo 'Succeeded!';
      return;
  }

  // Failed
  echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
