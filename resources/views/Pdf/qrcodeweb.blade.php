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
            width:90%;
        }
        .item-text{
            color: #767d7c;
            font-size: 11px;
            line-height: .15px;
        }

    </style>
</head>
<body class="border">

<img src="images/wajad_logo.png" style="width: 25%; margin-left: 25px; margin-top: 1%">
 
<div style="padding-left:20px">
    <br>
    <div style="text-align: left; color: #767d7c;">
        <p>
            Date: {{ date("l jS \of F Y h:i:s A") }} | Count: {{ $assignQrcode->qrcodes ? $assignQrcode->qrcodes : 0 }}
        </p>
    </div>
</div>
<div class="index-gallery">

    <?php $text='';?>
    @foreach ($assignQrcode->qrcodes as  $key => $model)

      @if($key % 4 === 0 && $key != 0)

      <br><br><br><br><br><br><br><br><br>

      @endif
        <div class="item">
            <img src="{{ env('APP_URL') . '/'. $model->image }}">
            <span class="item-text">{{ $model->unique_reference_number }}</span>
        </div>



    @endforeach
</div>

 
</body>
</html>
