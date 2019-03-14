<?php
   
$accessToken = "dr0CTYutcnUKHQSfdWOv9yMQI1F3HljZfcHcIedbCuFft8kMzH7fGbaMspAqand3KD2bN2TqqubE1sYvCDGDDBrX3cDJ6lGdGZoFxoajJnBKsh+K4tz/fsflL71LpZ/fdXWg5ar7ppN8ycx1vUUKOwdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   
$content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
  
$arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";

   //รับข้อความจากผู้ใช้
$message = $arrayJson['events'][0]['message']['text'];

   //รับ id ของผู้ใช้
$id = $arrayJson['events'][0]['source']['userId'];

   #ตัวอย่าง Message Type "Text + Sticker"
if($message == "สวัสดี"){
     if($id != null){
         echo "สวัสดีจ้า";
     }
     else{
        echo "อันยองงงง";
     }
   
}
  

   exit;
?>
