<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8"> 
        <title>Wajad</title>
        <style>
             p.groove {border-style: groove;}
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
  bottom: 100;
  width: 100%;
  text-align: left;
  padding-left: 50px;

}
 
        </style>
    </head>
    <body class="border">

 
<img src="images/header.png" style="width:100%;height:150px">
  <!-- <img src="images/smart_appco_logo2.png">

 
  <div class="header-right">
  <img src="images/ksa2.png" style="height: 100px;width:200px">
  </div> -->
  <br>
<p class="groove"></p>
<br>
       
<div style="padding-left:20px">
<br> 
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
                        <!-- <td>
                            Status<br><strong>{{ $model::STATUS[$model->status] }}</strong>
                        </td> -->
                        <td>
                            Qrcode Generate Reference Number<br><strong>{{ $model->generate_reference_number }}</strong>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <br> <br> <br>
            
            </div>
     
<div class="footer">
  <p><h1>Signature</h1></p>
  .......................................

</div>
    </body>
</html>