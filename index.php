<?php
require "vendor/autoload.php";
$access_token = 'W7m+52lxjP8MmMmnHxI3KRsE1CrtSj/ZViirZRtmTn4qxH3DmKmlo/sUcnAJ+DNfLWcKMqYJAXFQIKPD0Cf+VfZiojB4GMw5apErr8h1875Is2tgZEsYbxgWo5C1Pbk96AJ+r7T236RteT7Behr3OgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '64cfd7f8ed27af4c962c0317e4c81a77';
$idPush = '1597962894'
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($idPush, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
