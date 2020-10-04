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
            /*margin: 10px;*/
            /*padding: 10px;*/
            box-sizing: border-box;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 15%;
            width: 100%;
            text-align: left;
            /*padding-left: 50px;*/
            color: #767d7c;
        }
        .signature{
            color: #767d7c;
            font-size: 16px;
            text-align: right;
            margin-right: 25px;
            padding-bottom: 10%;
        }
        .item{
            position: relative;
            width:25%;
            text-align:center;
            display:block;
            background-color: transparent;
            border: 1px solid transparent;
            /*margin-right: 10px;*/
            margin-bottom: 1px;
            float:left;
        }
        .item img{
            max-width: 100%;
            display: block;
        }

        .index-gallery{
            width:400px;
        }

    </style>
</head>
<body class="border">

<img src="images/wajad_logo.png" style="width: 25%; margin-left: 25px; margin-top: 1%">

<div style="padding-left:20px">
    <br>
    <div style="text-align: left; color: #767d7c;">
        <p>
            Date: {{ date("l jS \of F Y h:i:s A") }} | Count: {{ $models ? $models->count() : 0 }}
        </p>
    </div>
</div>
<div class="index-gallery">
    @foreach (array_chunk($models->toArray(), 4) as $model)
        <div class="item">
            <img src="{{ env('APP_URL') . '/'. $model[0]['image']  }}">
            <p>{{ $model[0]['unique_reference_number'] }}</p>
        </div>
        <br>
        <div class="item">
            <img src="{{ env('APP_URL') . '/'. $model[1]['image']  }}">
            <p>{{ $model[1]['unique_reference_number'] }}</p>
        </div>
        <br>
        <div class="item">
            <img src="{{ env('APP_URL') . '/'. $model[2]['image']  }}">
            <p>{{ $model[2]['unique_reference_number'] }}</p>
        </div>
        <br>
        <div class="item">
            <img src="{{ env('APP_URL') . '/'. $model[3]['image']  }}">
            <p>{{ $model[3]['unique_reference_number'] }}</p>
        </div>
        <br>
    @endforeach
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
