<?php
$content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);

$id = $arrayJson['events'][0]['source']['userId'];


echo $id;
