<?php

use App\Http\Resources\ItemResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\FCMPostResource;

function getBadge($user)
{
    return $user->notifications()->whereNull('read_at')->count() == 0 ? 1 : $user->notifications()->whereNull('read_at')->count();
}


function sendPostRequestFCM($founder,$request_user,$post,$badge,$id)
{
    $ImageURL=env('ADMIN_URL').'/images/111.png';
    if($post->images)
    {
    if($post->images[0])
    $ImageURL= env('ADMIN_URL').$post->images[0];
    }

    $type='post_lost';
    if ($post->isFound()) 
        $type='post_found';
    $data = [
        'ar' => [
            'title' => ' لقد إستلمت طلب حق ملكية للمنشور الخاص لديك'.$post->title,
            'body' => ' لقد إستلمت طلب حق ملكية للمنشور الخاص لديك'
            .$post->title . ' '
            . $post->description 
            . ' من المستخدم  ' .
             $request_user->name 
        ],
        'en' => [
            'title' => 'You have received a copyright request for your  post '.$post->title,
            'body' => 'You have received a copyright request for your  post  '
            .$post->title . ' '
            . $post->description 
            . ' from user  ' .
             $request_user->name 
        ],
        'type' => 'post_request',
        'deeplink' => $type,
        'image' =>$ImageURL ,
        'post' => new FCMPostResource($post),
        'item' => null,
        'url' => null ,
        'id' => $id,
        'badge' => $badge   
    ];
    return $data;
}

function sendAcceptPostRequestFCM($founder,$post,$badge,$id)
{
    $ImageURL=env('ADMIN_URL').'/images/111.png';
    if($post->images)
    {
    if($post->images[0])
    $ImageURL= env('ADMIN_URL').$post->images[0];
    }

    $type='post_lost';
    if ($post->isFound()) 
        $type='post_found';
    $data = [
        'ar' => [
            'title' => ' لقد تم الموافقة علي  طلب حق ملكية للمنشور'.$post->title,
            'body' => ' لقد تم الموافقة علي  طلب حق ملكية للمنشور'
            .$post->title . ' '
            . $post->description 
            . ' من صاحب المنشور  ' .
             $founder->name 
        ],
        'en' => [
            'title' => 'The copyright request has been approved  for the post '.$post->title,
            'body' => 'The copyright request has been approved  for the post  '
            .$post->title . ' '
            . $post->description 
            . 'by  the owner of the post  ' .
             $founder->name 
        ],
        'type' => 'post_request',
        'deeplink' => $type,
        'image' => $ImageURL ,
        'post' => new FCMPostResource($post),
        'item' => null,
        'url' => null ,
        'id' => $id,
        'badge' => $badge   
    ];
    return $data;
}


function sendRejectPostRequestFCM($founder,$post,$badge,$id)
{
    $ImageURL=env('ADMIN_URL').'/images/111.png';
    if($post->images)
    {
    if($post->images[0])
    $ImageURL= env('ADMIN_URL').$post->images[0];
    }


    $type='post_lost';
    if ($post->isFound()) 
        $type='post_found';
    $data = [
        'ar' => [
            'title' => ' لقد تم رفض  طلب حق ملكية للمنشور'.$post->title,
            'body' => ' لقد تم رفض  طلب حق ملكية للمنشور'
            .$post->title . ' '
            . $post->description 
            . ' من صاحب المنشور  ' .
             $founder->name 
        ],
        'en' => [
            'title' => 'The copyright request has been rejected  for the post '.$post->title,
            'body' => 'The copyright request has been rejected  for the post  '
            .$post->title . ' '
            . $post->description 
            . 'by  the owner of the post  ' .
             $founder->name 
        ],
        'type' => 'post_request',
        'deeplink' => $type,
        'image' =>$ImageURL ,
        'post' => new FCMPostResource($post),
        'item' => null,
        'url' => null ,
        'id' => $id,
        'badge' => $badge   
    ];
    return $data;
}


function sendScanQRCodeFCM($item,$badge,$lat,$lng,$id)
{
    $ImageURL=env('ADMIN_URL').'/images/111.png';
    // if($item->images)
    // {
    // if($item->images[0])
    // $ImageURL= env('ADMIN_URL').$item->images[0];
    // }


    $title='';
    if($item)
    {
        $title=$item->title;
        if($item->images)
        {
        if($item->images[0])
        $ImageURL= env('ADMIN_URL').$item->images[0];
        }
   
    }
   
    $data = [
        'ar' => [
            'title' => '  هناك شخص  قرأ رمز التعريف  الخاص بك'.$title,
            'body' => 'هناك شخص  قرأ رمز التعريف  الخاص بك'
            .$title . ' '
            
            . 'يمكنك اللإطلاع علي الخريطة . ' 
        ],
        'en' => [
            'title' => 'There Some One Scanned Your QR Code '.$title,
            'body' => 'There Some One Scanned Your QR Code  '
            .$title . ' '
             
            . ' Check the location on the map . ' 
        ],
        'type' => 'scan_qrcode',
        'deeplink' => 'item',
        'image' => $ImageURL ,
        'post' =>null,
        'item' => new ItemResource($item),
        'url' => 'https://www.google.com/maps/search/?api=1&query='.$lat.','.$lng,
        'id' => $id,
        'badge' => $badge   
    ];
    return $data;
}

function sendCreateItemFCM($item,$badge)
{
    $ImageURL=env('ADMIN_URL').'/images/111.png';
    if($item->images)
    {
    if($item->images[0])
    $ImageURL= env('ADMIN_URL').$item->images[0];
    }

   // logger($item);
    $data = [
        'ar' => [
            'title' => '  الجهاز الخاص لديك'.$item->title,
            'body' => 'تم إضافة الجهاز الخاص لديك '
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
        'type' => 'create',
        'deeplink' => 'item',
        'image' =>$ImageURL ,
        'item' => new ItemResource($item),
        'post' => null,  
        'url' => null ,
        'id' => $item->id,
        'badge' => $badge   
    ];
    return $data;
}


function sendUpdateItemFCM($item,$badge)
{

    $ImageURL=env('ADMIN_URL').'/images/111.png';
    if($item->images)
    {
    if($item->images[0])
    $ImageURL= env('ADMIN_URL').$item->images[0];
    }


    $data = [
        'ar' => [
            'title' => '  الجهاز الخاص لديك'.$item->title,
            'body' => 'تم تعديل الجهاز الخاص لديك  '
            .$item->title . ' '
            . $item->details
            . ' بنجاح . ' 
        ],
        'en' => [
            'title' => 'The Item '.$item->title,
            'body' => 'Your Item  '
            .$item->title . ' '
            . $item->details
            . ' updated successfully . ' 
        ],
        'type' => 'update',
        'id' => $item->id,
        'deeplink' => 'item',
        'image' => $ImageURL ,
        'post' => null,
        'item' => new ItemResource($item),
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
        'id' => null,
        'deeplink' => 'topic',
        'image' =>env('ADMIN_URL').'/images/111.png' ,
        'post' => null,
        'item' => null,
        'url' => null ,
        'badge' => $badge   
    ];
    return $data;
}


function sendReportPostFCM($postReport,$badge)
{


    $type='post_lost';
    if ($postReport->post->isFound()) 
        $type='post_found';
    $data = [
        'ar' => [
            'title' => '  قام '. 
            $postReport->user->name .
             ' بالإبلاغ عن منشورك ',
            'body' => '  قام '. 
            $postReport->user->name .
             ' بالإبلاغ عن منشورك ' .  $postReport->post->title  
        ],
        'en' => [
            'title' =>$postReport->user->name .
             ' has reported your post ',
            'body' => $postReport->user->name .
            ' has reported your post ' .  $postReport->post->title  
        ],
        'type' => 'report',
        'deeplink' => $type,
        'image' =>$postReport->image ,
        'post' => new FCMPostResource($postReport->post),
        'item' => null,
        'url' => null ,
        'id' => $postReport->id,
        'badge' => $badge   
    ];
    return $data;
}


function sendBuyPackageFCM($package,$badge)
{

  
    $data = [
        'ar' => [
            'title' => '  لقد قمت بشراء'. 
            $package->name_ar .
             ' بنجاح. ',
            'body' => '  لقد قمت بشراء'. 
            $package->name_ar .
             ' وتحتوي علي  ' .  $package->quantity . ' QRCodes. '  
        ],
        'en' => [
            'title' => 'You have purchased '. 
            $package->name_en .
             ' successfully. ',
            'body' => 'You have purchased '. 
            $package->name_en .
             ' and contain  ' .  $package->quantity . ' QRCodes. '  
        ],
        'type' => 'package',
        'deeplink' => 'qrcode',
        'image' =>  env('ADMIN_URL').'/images/Success.jpg' ,
        'post' => null,
        'item' => null,
        'url' => null ,
        'id' => $package->id,
        'badge' => $badge   
    ];
    return $data;
}


function sendFreeQRCodeFCM($badge)
{
    $data = [
        'ar' => [
            'title' => '  تهانينا !',
            'body' => '  لقد تم إضافة'. 
            defaultGroup()->free_qrcodes .
             ' QRCodes لك مجانا لكونك مستخد جديد .  ' 
        ],
        'en' => [
            'title' => '  Congratulations ! ',
            'body' =>  '' .  defaultGroup()->free_qrcodes . ' QR Code have been added to you because you are a new user'
           
        ],
        'type' => 'free_qrcodes',
        'deeplink' => 'qrcode',
        'image' => env('ADMIN_URL').'/images/cong.png'  ,
        'post' => null,
        'item' => null,
        'url' => null ,
        'id' => null,
        'badge' => $badge   
    ];
    return $data;
}



function sendAssignQRCodesToUserFCM($badge,$quantity)
{
    $data = [
        'ar' => [
            'title' => '  تهانينا !',
            'body' => '  لقد تم إضافة'. 
            $quantity .
             ' QRCodes لك  .  ' 
        ],
        'en' => [
            'title' => 'Congratulations ! ',
            'body' =>  '' .  $quantity . ' QR Code have been added to you .'
           
        ],
        'type' => 'assign_qrcodes',
        'deeplink' => 'qrcode',
        'image' =>env('ADMIN_URL').'/images/qrcodeicon.png' ,
        'post' => null,
        'item' => null,
        'url' => null ,
        'id' => null,
        'badge' => $badge   
    ];
    return $data;
}



function sendCorporateAssignQRCodeFCM($quantity,$name,$badge)
{
    $data = [
        'ar' => [
            'title' => '   لقد تم إضافة رموز التعريف الخاصة لديك',
            'body' => '  لقد تم إضافة'. 
            $quantity .
             ' QRCodes ' .' من مؤسسة ' . $name
        ],
        'en' => [
            'title' => ' Your QRCode has been assigned ',
            'body' =>  '' .  $quantity . 'QR Code have been assigned to you from '  . $name . ' Corporate.'
           
        ],
        'type' => 'assign_qrcode',
        'deeplink' => 'qrcode',
        'image' =>env('ADMIN_URL').'/images/qrcodeicon.png'  ,
        'post' => null,
        'item' => null,
        'url' => null ,
        'id' => null,
        'badge' => $badge   
    ];
    return $data;
}



function sendCreatePostFCM($post,$badge,$type)
{
    $ImageURL=env('ADMIN_URL').'/images/111.png';
    if($post->images)
    {
    if($post->images[0])
    $ImageURL= env('ADMIN_URL').$post->images[0];
    }

    $data = [
        'ar' => [
            'title' => '  المنشور الخاص لديك '.$post->title,
            'body' => 'تم إضافة المنشور الخاص لديك  '
          //  .$item->title . ' '
            . $post->description . ' '
            . ' بنجاح . ' 
        ],
        'en' => [
            'title' => 'The Post '.$post->title,
            'body' => 'Your Post  '
           // .$post->title . ' '
            . $post->description. ' '
            . ' added successfully . ' 
        ],
        'type' => 'post_'.$type,
        'deeplink' => 'post_'.$type,
        'image' => $ImageURL ,
        'post' => new FCMPostResource($post),
        'item' => null,
        'url' => null ,
        'id' => $post->id,
        'badge' => $badge   
    ];
    return $data;
}


function sendUpdatePostFCM($post,$badge,$type)
{

    $ImageURL=env('ADMIN_URL').'/images/111.png';
    if($post->images)
    {
    if($post->images[0])
    $ImageURL= env('ADMIN_URL').$post->images[0];
    }


    $data = [
        'ar' => [
            'title' => '  المنشور الخاص لديك'.$post->title,
            'body' => 'تم تعديل المنشور الخاص لديك'
          //  .$item->title . ' '
            . $post->description . ' '
            . ' بنجاح . ' 
        ],
        'en' => [
            'title' => 'The Post '.$post->title,
            'body' => 'Your Post  '
           // .$post->title . ' '
            . $post->description. ' '
            . ' updated successfully . ' 
        ],
        'type' => 'post_'.$type,
        'deeplink' => 'post_'.$type,
        'image' =>$ImageURL ,
        'post' => new FCMPostResource($post),
        'item' => null,
        'url' => null ,
        'id' => $post->id,
        'badge' => $badge   
    ];
    return $data;
}



function sendAssignQRCodeFCM($item,$badge)
{
    $data = [
        'ar' => [
            'title' => ' تم إضافة رمز التعريف الخاص لديك',
            'body' => 'تم إضافة رمز التعريف الخاص لديك'
            .' إلي ' 
            . $item->title . ' ' 
            . ' بنجاح . ' 
        ],
        'en' => [
            'title' => 'Your QRCode has been assigned ',
            'body' => 'Your QRCode has been assigned  '
             . '  to '
            . $item->title. ' '
            . '  successfully . ' 
        ],
        'type' => 'assign_qrcode',
        'deeplink' => 'item',
        'image' =>env('ADMIN_URL').'/images/qrcodeicon.png'  ,
        'item' =>new ItemResource($item),
        'post' => null,
        'url' => null ,
        'id' => $item->id,
        'badge' => $badge   
    ];
    return $data;
}