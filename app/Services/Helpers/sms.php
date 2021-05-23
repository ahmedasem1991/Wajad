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


function sendBuyPackageSMS($package,$user)
{
    
    if($user->getLanguage()=='ar')
    $message='  لقد قمت بشراء '. $package->name_ar . ' بنجاح ' 
   . ' وتحتوي على  ' .  $package->quantity . ' QRCodes. '  ;
    else
    $message='  You have purchased '. 
    $package->name_en .
     ' and contain  ' .  $package->quantity . ' QRCodes. '  ;
    
    return $message;
}
