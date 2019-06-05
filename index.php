<?php

   $date = date("Y-m-d");
    $time = date("H:i:s");

    $serverName="1.179.246.109";
    $userName="root";
    $userPassword="cctsssystem";
    $dbName="db_uuline_test";

    $name = $_REQUEST['dma'];
    $token_id = $_GET['token_id'];
    $channelid = $_GET['channelid'];
    $cns = $_GET['channelsecreat'];
    
    $connect=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror".mysqli_error());
    mysqli_set_charset($connect,"utf8"); 

    $sql = "select token_id from tbl_tokenidlinebot where name='ระยอง'"; 
    $result = mysqli_query($connect,$sql) or die ("error".mysqli_error()); 

$accessToken = $result;//ดึงมาจาก db
   
$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);
  
/*$arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้*/
   
if($count_row > 1){        
            $query = "select token_id from tbl_tokenidlinebot where name='ระยอง'"; 
            $resource = mysqli_query($connect,$query) or die ("error".mysqli_error());
            
            echo $resource;
        }
        else{ 
            
        } 
/*$message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   
$id = $arrayJson['events'][0]['source']['userId'];
   #ตัวอย่าง Message Type "Text + Sticker"

if($message == "สวัสดี"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "อันองงงง";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";
      pushMsg($arrayHeader,$arrayPostData);
   
}
  
function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   
}

   exit;*/
?>
