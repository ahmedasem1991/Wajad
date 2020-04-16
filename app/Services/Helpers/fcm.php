<?php

function getBadge($user)
{

    return $user->notifications()->whereNull('read_at')->count() == 0 ? 1 : $user->notifications()->whereNull('read_at')->count();
}


function sendPostRequestFCM($founder,$request_user,$post,$badge,$id)
{
    $data = [
        'ar' => [
            'title' => ' لقد إستلمت طلب حق ملكية للمنشور الخاص لديك  '.$post->title,
            'body' => ' لقد إستلمت طلب حق ملكية للمنشور الخاص لديك   '
            .$post->title . ' '
            . $post->description 
            . ' من المستخدم  ' .
             $request_user->name 
        ],
        'en' => [
            'title' => ' You have received a copyright request for your  post '.$post->title,
            'body' => ' You have received a copyright request for your  post  '
            .$post->title . ' '
            . $post->description 
            . ' from user  ' .
             $request_user->name 
        ],
        'type' => 'post_request',
        'deeplink' => 'post_request',
        'image' =>null ,
        'url' => null ,
        'id' => $id,
        'badge' => $badge   
    ];
    return $data;
}

function sendAcceptPostRequestFCM($founder,$post,$badge,$id)
{
    $data = [
        'ar' => [
            'title' => ' لقد تم الموافقة علي  طلب حق ملكية للمنشور  '.$post->title,
            'body' => ' لقد تم الموافقة علي  طلب حق ملكية للمنشور   '
            .$post->title . ' '
            . $post->description 
            . ' من صاحب المنشور  ' .
             $founder->name 
        ],
        'en' => [
            'title' => ' The copyright request has been approved  for the post '.$post->title,
            'body' => ' The copyright request has been approved  for the post  '
            .$post->title . ' '
            . $post->description 
            . 'by  the owner of the post  ' .
             $founder->name 
        ],
        'type' => 'post_request',
        'deeplink' => 'post_request',
        'image' =>null ,
        'url' => null ,
        'id' => $id,
        'badge' => $badge   
    ];
    return $data;
}


function sendRejectPostRequestFCM($founder,$post,$badge,$id)
{
    $data = [
        'ar' => [
            'title' => ' لقد تم رفض  طلب حق ملكية للمنشور  '.$post->title,
            'body' => ' لقد تم رفض  طلب حق ملكية للمنشور   '
            .$post->title . ' '
            . $post->description 
            . ' من صاحب المنشور  ' .
             $founder->name 
        ],
        'en' => [
            'title' => ' The copyright request has been rejected  for the post '.$post->title,
            'body' => ' The copyright request has been rejected  for the post  '
            .$post->title . ' '
            . $post->description 
            . 'by  the owner of the post  ' .
             $founder->name 
        ],
        'type' => 'post_request',
        'deeplink' => 'post_request',
        'image' =>null ,
        'url' => null ,
        'id' => $id,
        'badge' => $badge   
    ];
    return $data;
}


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