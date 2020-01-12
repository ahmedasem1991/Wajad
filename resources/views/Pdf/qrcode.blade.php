<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8"> 
        <title>Wajad</title>
        <style>
            table {
                border-collapse: collapse;
                text-align: center;
            }
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body> 
        <div class="container border">
            <header class="row">
            @include('partials.header')
            </header><br><br>
            <div id="main"  class="row">
                <div style="text-align: left">
                    <p>
                        Date: <strong>{{ date("l jS \of F Y h:i:s A") }}</strong>
                    </p>
                    <p>
                        Count: <strong>{{ $models ? $models->count() : 0 }}</strong>
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
                <br> <br> <br>
                <footer class="row">
                    @include('partials.footer')  
                </footer>
            </div>
        </div>
    </body>
</html>