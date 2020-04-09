<?php

function sendScanQRCodeSMS($user,$item)
{
    $title='';
    if($item)
    $title=$item->title;
    
    if($user->getLanguage()=='ar')
    $message='  هناك شخص  قرأ رمز التعريف  الخاص بك '.$title;
    else
    $message='  There Some One Scanned Your QR Code '.$title;
    
    return $message;
}