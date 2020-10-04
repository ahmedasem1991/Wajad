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
        table {
            border-collapse: collapse;
            text-align: center;
        }
        table, th, td {
            border: 1px solid black;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 15%;
            width: 100%;
            text-align: left;
            padding-left: 50px;
            color: #767d7c;
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
<body class="border">


<img src="images/wajad_logo.png" style="width: 25%; margin-left: 25px; margin-top: 1%">
<!-- <img src="images/smart_appco_logo2.png">


<div class="header-right">
<img src="images/ksa2.png" style="height: 100px;width:200px">
</div> -->


<div style="padding-left:20px">
    <br>
    <div style="text-align: left; color: #767d7c;">
        <p>
            Date: {{ date("l jS \of F Y h:i:s A") }}
        </p>
        <p>
            Count: {{ $models ? $models->count() : 0 }}
        </p>
    </div>
    <table>
        @foreach ($models as $model)
            <tr style="margin-bottom:5px">
                <td>
                    <img style="width: 300px" src="{{ env('APP_URL') . '/'. $model->image  }}">
                </td>
            <!-- <td>
                            Status<br><strong>{{ $model::STATUS[$model->status] }}</strong>
                        </td> -->
                <td>
                    Qrcode Unique Reference Number<br>{{ $model->unique_reference_number }}
                </td>
            </tr>
        @endforeach
    </table>
    <br> <br> <br>



<div class="footer">
    <div class="signature"><p>
        <p>Signature</p>
    </div>
    <p><small>{{$settings['Address-1']}} | {{$settings['Phone-Number-1']}} - {{$settings['Address-2']}} | {{$settings['Phone-Number-2']}}
            <hr>{{$settings['Email-1']}} | {{$settings['Email-2']}}</small></p>
</div>
</div>
</body>
</html>
