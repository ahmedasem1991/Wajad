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
        'url' => 'https://www.google.com/maps/search/?api=1&query='.$lat.','.$lng,
        'type' => 'qrcode',
        'object_type' => 'scan',
        'id' => $id,
        'related_id' =>$item ?$item->title : -1,
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
        'object_type' => 'new',
        'id' => $item->id,
        'related_id' =>-1,
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
        'object_type' => 'new',
        'id' => $item->id,
        'related_id' =>-1,
        'badge' => $badge   
    ];
    return $data;
}