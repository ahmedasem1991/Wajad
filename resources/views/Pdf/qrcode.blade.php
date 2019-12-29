<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        table {
            border-collapse: collapse;
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div style="text-align: left;margin-bottom: 10px;">
        <img src="{{ env("APP_URL") .'/images/wajad_logo.png'}}" style="max-height:75px;">
    </div>
    <div style="text-align: center">
        <p>
            Date : <strong>{{ now() }}</strong>
        </p>
        <p>
            Count : <strong>{{ $models ? $models->count() : 0 }}</strong>
        </p>
    </div>
    <table>
        @foreach ($models as $model)
        <tr style="margin-bottom:5px">
            <td>
                <img style="width: 300px" src="{{ env('APP_URL') . '/'. $model->image  }}">
            </td>
            <td>
                Status<br><strong>{{ $model::STATUS[$model->status] }}</strong>
            </td>
            <td>
                Qrcode Generate Reference Number<br><strong>{{ $model->generate_reference_number }}</strong>
            </td>
        </tr>
        @endforeach
    </table>

</body>

</html>
