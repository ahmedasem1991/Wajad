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
            color: black;
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
            width: 100%;
            height: 100%;
            margin: 10px;
            padding: 10px;
            box-sizing: border-box;
        }
        p.groove {border-style: groove;}
        .image-div{
            float:left;
            margin-right:10px;
            max-width: 25%;
            max-height: 25%;
        }

        .footer {
            position: absolute;
            left: 0;
            bottom: -20%;
            width: 100%;
            text-align: left;
            padding-bottom: 50px;
            margin-bottom: 20px;
            color: #767d7c;

        }
        .body-title{
            text-align: center;
            margin-bottom: 50px;
            color: #767d7c;
        }
        .body-content{
            margin-bottom: 90px;
            color: #767d7c;
            font-size: 16px
        }
        .signature{
            color: #767d7c;
            font-size: 16px;
            text-align: right;
            margin-right: 25px;
            padding-bottom: 10%;
        }

    </style>
</head>
<img src="images/wajad_logo.png" style="width: 25%; margin-left: 25px; margin-top: 1%">
<body class="border">


<!-- <img src="images/smart_appco_logo2.png">


<div class="header-right">
<img src="images/ksa2.png" style="height: 100px;width:200px">
</div> -->
{{--  <br>--}}
{{--<p class="groove"></p>--}}
{{--<br>--}}



<div style="padding-left:20px">
    <br>
    <div class="body-title"><h2>RECEIPT</h2> </div>
    <div class="body-content">
        <p>I declare that / {{GoogleTranslate::trans($post->owner->name ?? "..............................................",'en') }}
            <br><br>on the day {{\Carbon\Carbon::now()->format('l')}} corresponding {{\Carbon\Carbon::now()->format('d-m-Y')}}<br> <br>
            That I received my missing item
            {{GoogleTranslate::trans($post->title ,'en')}} <br> <br>
            With the following specifications :
            {{GoogleTranslate::trans($post->description ?? "..................",'en') }} <br> <br>
            Of subcategory
        @if($post->subcategory)    {{$post->subcategory->name_en}} @endif
            Brand
            @if($post->brand)        {{$post->brand->name_en}}@endif
            Model
            @if($post->model)       {{$post->model->name_en}}@endif
            Color
            @if($post->color)      {{$post->color->name_en}}@endif
        </p>
        @if(!empty($post->item->images))
            <img src="{{public_path($post->item->images[0])}}" alt="" style="max-width: 250px">
        @endif
    </div>

    <div class="footer">
        <div class="signature"><p>
            <p>Signature</p>
        </div>
        <p><small>{{$settings['Address-1']}} | {{$settings['Phone-Number-1']}} - {{$settings['Address-2']}} | {{$settings['Phone-Number-2']}}
                <hr>{{$settings['Email-1']}} | {{$settings['Email-2']}}</small></p>
    </div>
</body>
</html>
