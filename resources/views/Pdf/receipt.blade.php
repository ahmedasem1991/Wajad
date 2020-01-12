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
        <b> {{$post->owner->name ?? " "}} </b>  
            فى يوم ................. الموافق ................. <br> <br>
            بأنى استلمت العنصر المفقود الخاص بي 
        <b> {{$post->title}}</b>  <br> <br>
            بالمواصفات التالية : 
        <b> {{$post->description}}</b>  <br> <br>
            من فئة 
        <b> {{$post->subcategory->name_ar}} </b>  
            ماركة
        <b> {{$post->brand->name_ar}} </b>  
            موديل 
        <b> {{$post->model->name_ar}} </b>  
            لون      
        <b> {{$post->color->name_ar}} </b><br><br>
            من مكتب وجد فى 15 ش جدة المملكة العربية السعودية.
        </div>
        <br> <br> <br>
        <footer class="row">
            @include('partials.footer')  
        </footer>
    </div>
    </body>
</html>