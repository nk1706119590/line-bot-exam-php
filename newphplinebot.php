

<?php 
	/*Get Data From POST Http Request*/
	$datas = file_get_contents('php://input');
	/*Decode Json From LINE Data Body*/
	$deCode = json_decode($datas,true);

	file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

	$replyToken = $deCode['events'][0]['replyToken']; // เก็บค่า replyToken ไว้

  if($messages == "555"){
    $messages['replyToken'] = $replyToken; 
	  $messages['messages'][0] = getFormatTextMessage("ตัวเลข"); 
  }

	/*$messages = []; // ข้อความที่ user ส่งเข้ามา
	$messages['replyToken'] = $replyToken; 
	$messages['messages'][0] = getFormatTextMessage("เอ้ย ถามอะไรก็ตอบได้");*/ // ไปดู function getFormatMessage

	$encodeJson = json_encode($messages); // แปลง Json เป็น array

	$LINEDatas['url'] = "https://api.line.me/v2/bot/message/reply"; // เรียกใช้ api จาก Line
  $LINEDatas['token'] = "dr0CTYutcnUKHQSfdWOv9yMQI1F3HljZfcHcIedbCuFft8kMzH7fGbaMspAqand3KD2bN2TqqubE1sYvCDGDDBrX3cDJ6lGdGZoFxoajJnBKsh+K4tz/fsflL71LpZ/fdXWg5ar7ppN8ycx1vUUKOwdB04t89/1O/w1cDnyilFU="; // channel token line bot

  	$results = sentMessage($encodeJson,$LINEDatas); // ไปดูที่ function sendMessage

	/*Return HTTP Request 200*/
	http_response_code(200);

	function getFormatTextMessage($text)
	{
		$datas = []; // ตัวแปรที่รับค่าเข้ามา >> มาจากบรรทัดบนสุด
		$datas['type'] = 'text';
		$datas['text'] = $text; // นำข้อความมาเก็บไว้ใน $text

		return $datas; // ส่งค่ากลับไปที่ $messages
	}

	function sentMessage($encodeJson,$datas)
	{
		$datasReturn = [];
		$curl = curl_init(); //สร้าง curl resource
		curl_setopt_array($curl, array( // set option ในที่นี้คือ array
		  CURLOPT_URL => $datas['url'],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $encodeJson,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Bearer ".$datas['token'],
		    "cache-control: no-cache",
		    "content-type: application/json; charset=UTF-8",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		    $datasReturn['result'] = 'E';
		    $datasReturn['message'] = $err;
		} else {
		    if($response == "{}"){
			$datasReturn['result'] = 'S';
			$datasReturn['message'] = 'Success';
		    }else{
			$datasReturn['result'] = 'E';
			$datasReturn['message'] = $response;
		    }
		}

		return $datasReturn;
	}
?>

