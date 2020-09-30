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
            position: fixed;
            left: 0;
            bottom: 5%;
            width: 100%;
            text-align: left;
            padding-bottom: 50px;
            margin-bottom: 20px;

        }
        .body-title{
            text-align: center;
            margin-bottom: 50px;
        }
        .body-content{
            margin-bottom: 90px;
        }
        .signature{
            position: absolute;
        }

    </style>
</head>
<img src="images/wajad_logo.png" style="width: 25%; margin-left: 25px">
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
    <div class="body-title"><h2><u>Receipt</u></h2> </div>
    <div class="body-content">
        <p>I declare that /<b> {{GoogleTranslate::trans($post->owner->name ?? "...........................",'en') }} </b>
            on the day ............................ corresponding .............................. .<br> <br>
            That I received my missing item
            <b> {{GoogleTranslate::trans($post->title ,'en')}}</b> <br> <br>
            With the following specifications :
            <b> {{GoogleTranslate::trans($post->description ?? "..................",'en') }}</b> <br> <br>
            Of subcategory
            <b> {{$post->subcategory->name_en}} </b>
            Brand
            <b> {{$post->brand->name_en}} </b>
            Model
            <b> {{$post->model->name_en}} </b>
            Color
            <b> {{$post->color->name_en}} </b>
        </p>
    </div>
    <div class="signature"><p>
        <h1>Signature</h1>
        <p>.......................................</p></div>
</div>
<div class="footer">
    <p><small>{{$settings['Address-1']}} | {{$settings['Phone-Number-1']}} - {{$settings['Address-2']}} | {{$settings['Phone-Number-2']}}
            <hr>{{$settings['Email-1']}} | {{$settings['Email-2']}}</small></p>
</div>
</body>
</html>
