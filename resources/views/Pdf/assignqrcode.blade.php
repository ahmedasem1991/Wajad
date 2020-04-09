<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8"> 
        <title>Wajad</title>
        <style>
             p.groove {border-style: groove;}
            .border { 
            border: 2px solid #000;
            width: 100%;
            height: 100%;
            margin: 10px;
            padding: 10px;
            box-sizing: border-box;
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
<center><h2><u>Receipt</u></h2> </center>
        I declare that /
            <b> {{$assignqrcode->user->name ?? ".................."}} </b>    
            On the day ................. corresponding ................. <br> <br>
            That I got a number <b>{{$assignqrcode->quantity}}</b> QRcode
            Of a type <b>{{$assignqrcode->type==1? "Single Assign":"Multi Assign"}}</b><br> <br>
            They have an reference number: <b>{{$assignqrcode->assign_reference_number}}</b>
        </div>
        <br> <br> <br>
       
<div class="footer">
  <p><h1>Signature</h1></p>
  .......................................

</div>
  
    </body>
</html>
   