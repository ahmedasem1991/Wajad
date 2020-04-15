<?php


function sendScanQRCodeFCM($item,$badge,$lat,$lng,$id)
{
    $title='';
    if($item)
    $title=$item->title;
    $data = [
        'ar' => [
            'title' => '  هناك شخص  قرأ رمز التعريف  الخاص بك '.$title,
            'body' => 'هناك شخص  قرأ رمز التعريف  الخاص بك  '
            .$title . ' '
            
            . 'يمكنك اللإطلاع علي الخريطة . ' 
        ],
        'en' => [
            'title' => '  There Some One Scanned Your QR Code '.$title,
            'body' => 'There Some One Scanned Your QR Code  '
            .$title . ' '
             
            . ' Check the location on the map . ' 
        ],
        'type' => 'qrcode',
        'deeplink' => 'qrcode',
        'image' => null ,
        'url' => 'https://www.google.com/maps/search/?api=1&query='.$lat.','.$lng,
        'id' => $id,
        'badge' => $badge   
    ];
    return $data;
}

function sendCreateItemFCM($item,$badge)
{
    $data = [
        'ar' => [
            'title' => '  الجهاز الخاص لديك '.$item->title,
            'body' => 'تم إضافة الجهاز الخاص لديك  '
            .$item->title . ' '
            . $item->details
            . ' بنجاح . ' 
        ],
        'en' => [
            'title' => '  The Item '.$item->title,
            'body' => 'Your Item  '
            .$item->title . ' '
            . $item->details
            . ' added successfully . ' 
        ],
        'type' => 'item',
        'deeplink' => 'item',
        'image' =>null ,
        'url' => null ,
        'id' => $item->id,
        'badge' => $badge   
    ];
    return $data;
}


function sendUpdateItemFCM($item,$badge)
{
    $data = [
        'ar' => [
            'title' => '  الجهاز الخاص لديك '.$item->title,
            'body' => 'تم تعديل الجهاز الخاص لديك  '
            .$item->title . ' '
            . $item->details
            . ' بنجاح . ' 
        ],
        'en' => [
            'title' => '  The Item '.$item->title,
            'body' => 'Your Item  '
            .$item->title . ' '
            . $item->details
            . ' updated successfully . ' 
        ],
        'type' => 'item',
        'id' => $item->id,
        'deeplink' => 'item',
        'image' =>null ,
        'url' => null ,
        'badge' => $badge   
    ];
    return $data;
}


function sendCustomUsersFCM($body,$badge)
{
    $data = [
        'ar' => [
            'title' => '  وجد ',
            'body' => $body,
           
        ],
        'en' => [
            'title' => '  WAJAD ',
            'body' => $body
          
        ],
        'type' => '',
        'id' => '',
        'deeplink' => 'topic',
        'image' =>null ,
        'url' => null ,
        'badge' => $badge   
    ];
    return $data;
}