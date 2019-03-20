<?php
/**
 * Created by PhpStorm.
 * User: ACHURA
 * Date: 20/3/2562
 * Time: 8:42
 */

$opts = [
    "http" => [
        "header" => "Content-Type: application/json\r\n"."Authorization: Bearer <dr0CTYutcnUKHQSfdWOv9yMQI1F3HljZfcHcIedbCuFft8kMzH7fGbaMspAqand3KD2bN2TqqubE1sYvCDGDDBrX3cDJ6lGdGZoFxoajJnBKsh+K4tz/fsflL71LpZ/fdXWg5ar7ppN8ycx1vUUKOwdB04t89/1O/w1cDnyilFU=>"
    ]
];

$context = stream_context_create($opts);

$profile_json = file_get_contents('https://api.line.me/v2/bot/profile/<U5e9acf1216646459855f5735a974b170>', false, $context);
$profile_array = json_decode($profile_json, true);
echo($profile_array);


?>
