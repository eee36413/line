<?php // callback.php
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
//$access_token = 'W7m+52lxjP8MmMmnHxI3KRsE1CrtSj/ZViirZRtmTn4qxH3DmKmlo/sUcnAJ+DNfLWcKMqYJAXFQIKPD0Cf+VfZiojB4GMw5apErr8h1875Is2tgZEsYbxgWo5C1Pbk96AJ+r7T236RteT7Behr3OgdB04t89/1O/w1cDnyilFU=';
$access_token = 'ZWxQqnhMzlCiXKWQZpoINqRiIsMtCzG6CRwB8USNau7n58ynal6cS7eOjoLunKGoLWcKMqYJAXFQIKPD0Cf+VfZiojB4GMw5apErr8h1877G0LdR7tJTdHS5AzRBMvVORbV+J1qs6cS+Z0xYMEzV7gdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
// Loop through each event
foreach ($events['events'] as $event) {
// Reply only when message sent is in 'text' format
if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
// Get text sent
$text = $event['source']['userId'];
// Get replyToken
$replyToken = $event['replyToken'];
// Build message to reply back
$messages = [
'type' => 'text',
'text' => $text
];
// Make a POST Request to Messaging API to reply to sender
$url = 'https://api.line.me/v2/bot/message/reply';
$data = [
'replyToken' => $replyToken,
'messages' => [$messages],
];
$post = json_encode($data);
$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result . "\r\n";
}
}
}
echo "OK2560001";
