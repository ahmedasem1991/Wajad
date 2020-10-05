<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Wajad</title>
    <style>
        p.groove {border-style: groove;}
        .border {
            /*border: 2px solid #000;*/
            width: 100%;
            height: 100%;
            margin: 10px;
            padding: 10px;
            box-sizing: border-box;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 15%;
            width: 100%;
            text-align: left;
            padding-left: 50px;
            margin-bottom: 20px;
            color: #767d7c;

        }
        .body-title{
            text-align: center;
            margin-bottom: 50px;
            margin-top: 100px;
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
    <div class="body-title"><h2>RECEIPT</h2> </div>
    <div class="body-content">
        I declare that /
         {{$assignqrcode->user->name ?? "............................................................................................."}}
         <br><br>On the day {{\Carbon\Carbon::now()->format('l')}} corresponding {{\Carbon\Carbon::now()->format('d-m-Y')}} <br> <br>
        That I got a number {{$assignqrcode->quantity}} QRcode
        Of a type {{$assignqrcode->type==1? "Single Assign":"Multi Assign"}}<br> <br>
        They have an reference number: {{$assignqrcode->assign_reference_number}}
    </div>
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
