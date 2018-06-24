<?php

ob_start();

$API_KEY = '509381575:AAGuhTj2_gxl2mdeuY0DDCRycqDjK1mBK4k';
define('API_KEY', $API_KEY);
function bot($method, $datas=[]){
    $url = "https://api.teleram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }
    else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;

if($text == '/start'){
bot('sendMessage', [
    'chat_id'=>$chat_id,
    'text'=>'Welcome',
]);
}
?>
