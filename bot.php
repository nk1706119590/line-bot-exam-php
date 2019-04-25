<?php
  // กรณีต้องการตรวจสอบการแจ้ง error ให้เปิด 3 บรรทัดล่างนี้ให้ทำงาน กรณีไม่ ให้ comment ปิดไป
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  // include composer autoload
  require "vendor/autoload.php";
  // การตั้งเกี่ยวกับ bot
  require 'bot_settings.php';
/*$access_token = 'JOALJaFzXSS1/Iw0lRElqFUMiBHUF4LhFisSOpo9WpfG4Ju5l+o+o5yTWeYVIqOhwPafmf63J283XV1uMahQlwgdfCxzlKipJygVt7h4z9Fbt0mq+eQivXcy4jj4oyvvH8a6cp39m8SO/3I9OyLmVgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '7410da12768dbb3db2632dd64ed33a12';*/
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
//use LINE\LINEBot\Event;
//use LINE\LINEBot\Event\BaseEvent;
//use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder ;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
  // เชื่อมต่อกับ LINE Messaging API
$httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
$bot = new LINEBot($httpClient, array('channelSecret' => LINE_MESSAGE_CHANNEL_SECRET));
  // คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
  $content = file_get_contents('php://input');
 // แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array
$events = json_decode($content, true);
if(!is_null($events)){
    // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
    $replyToken = $events['events'][0]['replyToken'];
    $typeMessage = $events['events'][0]['message']['type'];
    $userMessage = $events['events'][0]['message']['text'];
    $userMessage = strtolower($userMessage);
    switch ($typeMessage){
        case 'text':
            switch ($userMessage) {
                case "ถาม-ตอบ กับแอดมิน":
                    $textReplyMessage = "ขณะนี้เป็นระบบตอบกลับอัตโนมัติ ช่วงเวลาทำการของ ถาม-ตอบ กับแอดมิน คือ 10.00 น. - 17.00 น. เท่านั้น";
                    $replyData = new TextMessageBuilder($textReplyMessage);
                    break;
                case "แจ้งเหตุเสีย":
                    $actionBuilder = array(
                        new MessageTemplateActionBuilder(
                            'Add to Card',// ข้อความแสดงในปุ่ม
                            '555' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                        ),
                        new UriTemplateActionBuilder(
                            'เข้าสู่เว็บไซต์', // ข้อความแสดงในปุ่ม
                            'https://manager.line.biz/account/@578priml/richmenu'
                        ), 
                    );
                
                $imageUrl = 'https://3.bp.blogspot.com/-AEczW23WrA8/V7NMIIdxUwI/AAAAAAAAAHQ/3312FluUinUjlx7xkjl2Mjeki9H0FQxDwCLcB/s1600/contact.jpg';
                    $replyData = new TemplateMessageBuilder('Button Template',
                        new ButtonTemplateBuilder(
                                'ติดต่อเรา', // กำหนดหัวเรื่อง
                                ' ', // กำหนดรายละเอียด
                                $imageUrl, // กำหนด url รุปภาพ
                                $actionBuilder  // กำหนด action object
                        )
                    );    
                         
                    /*$columns = array();
                    $img_url = "https://www.wallpaperup.com/uploads/wallpapers/2014/01/07/218890/d1e564fc5ab85b3ff9404c84d8268f13-700.jpg";
                    for($i=0;$i<5;$i++) {
                      $actionBuilder = array(
                        new PostbackTemplateActionBuilder('Add to Card','action=carousel&button='.$i),
                        new UriTemplateActionBuilder('View','http://www.google.com')
                      );
                      $column = new CarouselColumnTemplateBuilder('Title', 'description', $img_url , $actionBuilder);
                      $columns[] = $column;
                    }
                
                    $carousel = new CarouselTemplateBuilder($columns);
                    $outputText = new TemplateMessageBuilder('Carousel Demo', $carousel);*/
                    break;
                case "ติดต่อเรา":
                    // กำหนด action 2 ปุ่ม 2 ประเภท
                    $actionBuilder = array(
                        new MessageTemplateActionBuilder(
                            'ถาม-ตอบ กับแอดมิน',// ข้อความแสดงในปุ่ม
                            'ถาม-ตอบ กับแอดมิน' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                        ),
                        new UriTemplateActionBuilder(
                            'เข้าสู่เว็บไซต์', // ข้อความแสดงในปุ่ม
                            'https://manager.line.biz/account/@578priml/richmenu'
                        ), 
                        /*new PostbackTemplateActionBuilder(
                            'Postback', // ข้อความแสดงในปุ่ม
                            http_build_query(array(
                                'action'=>'buy',
                                'item'=>100
                            )), // ข้อมูลที่จะส่งไปใน webhook ผ่าน postback event
                            'Postback Text'  // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                        ),  */    
                    );
                    $imageUrl = 'https://3.bp.blogspot.com/-AEczW23WrA8/V7NMIIdxUwI/AAAAAAAAAHQ/3312FluUinUjlx7xkjl2Mjeki9H0FQxDwCLcB/s1600/contact.jpg';
                    $replyData = new TemplateMessageBuilder('Button Template',
                        new ButtonTemplateBuilder(
                                'ติดต่อเรา', // กำหนดหัวเรื่อง
                                ' ', // กำหนดรายละเอียด
                                $imageUrl, // กำหนด url รุปภาพ
                                $actionBuilder  // กำหนด action object
                        )
                    );              
                    break;
                case "ประชาสัมพันธ์":
                    $textReplyMessage = "ไม่มีข่าวอัพเดทค่ะ";
                    $replyData = new TextMessageBuilder($textReplyMessage);
                    break;
                default:
                    $textReplyMessage = " คุณไม่ได้พิมพ์ ค่า ตามที่กำหนด";
                    $replyData = new TextMessageBuilder($textReplyMessage);         
                    break;                                      
            }
            break;
        default:
            $textReplyMessage = json_encode($events);
            $replyData = new TextMessageBuilder($textReplyMessage);         
            break;  
    }
}
//l ส่วนของคำสั่งตอบกลับข้อความ
$response = $bot->replyMessage($replyToken,$replyData);
?>
