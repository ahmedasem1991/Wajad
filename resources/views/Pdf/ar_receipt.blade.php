<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {box-sizing: border-box;}

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.5;
        }

        .header {
            overflow: hidden;
            background-color: #f1f1f1;
            padding: 20px 10px;
        }

        .header a {
            float: left;
            color: grey;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
        }

        .header a:hover {
            background-color: #ddd;
            color: black;
        }

        .header a.active {
            background-color: dodgerblue;
            color: white;
        }

        .header-right {
            float: right;
        }

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
            }
        }
        .border {
            /*border: 2px solid #000;*/
            width: 98%;
            height: 100%;
            margin: 10px;
            padding: 10px;
            box-sizing: border-box;
            clear: right;
        }
        p.groove {border-style: groove;}
        .image-div{
            float:left;
            margin-right:10px;
            max-width: 20%;
            max-height: 20%;
        }

        .footer {
            position: fixed;
            right: 1%;
            bottom: -5%;
            width: 90%;
            padding-right: 7%;
            text-align: left;
            padding-bottom: 50px;
            margin-bottom: 20px;
            color: #767d7c;

        }
        .body-title{
            text-align: center;
            margin-bottom: 80px;
            color: #767d7c;
        }
        .body-content{
            margin-bottom: 90px;
            color: #767d7c;
            position: absolute;
            font-size: 16px
        }
        .signature{
            margin-bottom: 15%;
            color: #767d7c;
            font-size: 16px
        }


    </style>
    <style type="text/css" media="print">
        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
    </style>
</head>
<img src="images/wajad_logo.png"
     style="width:25%; margin-right: 30px; margin-top: 3%; float: right">
<body class="border">


<!-- <img src="images/smart_appco_logo2.png">


<div class="header-right">
<img src="images/ksa2.png" style="height: 100px;width:200px">
</div> -->
{{--  <br>--}}
{{--<p class="groove"></p>--}}
{{--<br>--}}



<div style="padding-right:20px; padding-top: 50px;clear: both" dir="rtl">
    <div class="body-title"><h2>إقرار</h2> </div>
    <div class="body-content"><p>
            أفر أنا /
            {{GoogleTranslate::trans($post->owner->name ?? "...........................",'ar') }}
            في يوم {{GoogleTranslate::trans(\Carbon\Carbon::now()->format('l'), 'ar')}}
            الموافق {{GoogleTranslate::trans(\Carbon\Carbon::now()->format('d-m-Y'),'ar')}}<br> <br>
            بأنى استلمت العنصر المفقود الخاص بي
            {{GoogleTranslate::trans($post->title, 'ar')}} <br> <br>
            بالمواصفات التالية :
            {{GoogleTranslate::trans($post->description, 'ar') ?? ".................."}} <br> <br>
            من فئة
            @if($post->subcategory){{$post->subcategory->name_ar}}@endif
            ماركة
            @if($post->brand)   {{$post->brand->name_ar}}@endif
            موديل
            @if($post->model)  {{$post->model->name_ar}}@endif
            لون
            @if($post->color)   {{$post->color->name_ar}}@endif
        </p>
        @if(!empty($post->item->images))
            <img src="{{$post->item->images[0]}}" alt="" style="max-width: 250px">
        @endif
    </div>
</div>

<div class="footer">
    <div class="signature">
        <p>التوقيع</p>
    </div>
    <p><small>{{$settings['Address-1']}} | {{$settings['Phone-Number-1']}} - {{$settings['Address-2']}} | {{$settings['Phone-Number-2']}}
            <hr>{{$settings['Email-1']}} | {{$settings['Email-2']}}</small></p>
</div>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>
