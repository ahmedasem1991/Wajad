<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8"> 
        <title>Wajad</title>
        <style>
            .border { 
            border: 5px solid #000;
            width: 100%;
            height: 100%;
            margin: 10px;
            padding: 10px;
            box-sizing: border-box;
            }
        </style>
    </head>
    <body>
    <div class="container border">
        <header class="row">
        @include('partials.header')
        </header><br><br>
        <div id="main" dir="rtl" class="row">  
            أقر أنا أ/
            <b> {{$assignqrcode->user->name}} </b>    
            فى يوم ................. الموافق ................. <br> <br>
            بأنى حصلت على عدد <b>{{$assignqrcode->quantity}}</b> QRcode
            من فئة <b>{{$assignqrcode->type==1? "Single Assign":"Multi Assign"}}</b><br> <br>
            لهم رقم تعيين: <b>{{$assignqrcode->assign_reference_number}}</b>
        </div>
        <br> <br> <br>
        <footer class="row">
            @include('partials.footer')  
        </footer>
    </div>
    </body>
</html>
   