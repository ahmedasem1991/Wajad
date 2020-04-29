<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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
            border: 2px solid #000;
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
  max-width: 20%;
  max-height: 20%;
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

<a class="" style="color:#8F7BEF" onclick="printDiv('test','test','test','test','test','test','100','100','20','100','50','90','2')"><center><img src="https://w0.pngwave.com/png/680/788/hewlett-packard-hp-laserjet-printer-laser-printing-jet-png-clip-art.png" style="height: 60px;width: 60px"></center></a> 
  
<div style="padding-left:20px">
<br> 
  <center><h2><u>إقرار</u></h2> </center>

  <div id="printing_div" style="border: 3px;display: none;">
<center>
<h1><strong > ستاد </strong><strong id="stadium_pr"></strong></h1>
*إيصال دفع نقدية*
<br> <br>
<table  style="width: 200px;direction: rtl;">
<tbody>
    <!-- <tr>
<th>إسم الإستاد:</th> <th id="stadium_pr"></th>
</tr> -->
<tr>
<th>رقم الحجز :</th> <th id="serial_no_pr"></th>
</tr>

<tr>
<th>إسم الملعب :</th> <th id="playground_id_pr"></th>
</tr>



<tr>
<th> حجز بواسطة :</th> <th id="user_name_pr"></th>
</tr>
<tr>
<th >إسم اللاعب:</th><th id="player_name_pr"></th>
</tr>
<tr>
<th >تاريخ الحجز:</th> <th id="date_pr"></th>
</tr>

<tr>
<th >وقت الحجز:</th> <th id="time_pr"></th>
</tr>

 
<tr>
<th>التاريخ:</th><th id="today_pr"></th>
</tr>

<tr>
<th>تليفون :</th> <th id="phone_pr"></th>
</tr>

</tbody>
</table>


<p class="solid"></p>

<table style="width: 200px;direction: rtl;">
<tbody>
<tr>
<th><strong>المدفوع</strong></th>
<th id="paid_pr" ></th>
</tr>

<tr>
<th ><strong>المتبقي:</strong></th>
<th id="unpaid_pr"></th>
</tr> 

<tr >
<th ><strong>الخصم:</strong></th>

<th id="discount_pr"></th>
</tr> 

 
 


<tr>
<th><font size="4"><strong>الإجمالي</strong></font></th>
<th id="total_pr"></th>
</tr>
</tbody>
</table>


<p class="solid">* جميع الحقوق محفوظة لملاعب مصر  *</p>
<small> this ticket also serves as your receipt</small><br>
<small> يمكنك تحميل تطبيق ملاعب مصر من خلال 
<br>
</small>
<img height="50" width="50" src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=https://play.google.com/store/apps/details?id=com.muhamed_ragab&choe=UTF-8"  />
</center>

</div>
  <iframe  name="print_frame" style="border:2px solid black;height: 90%;width: 100%;display:none" frameborder="0" src="about:blank"></iframe> 
 
</div>

<div class="footer">
  <p><h1>التوقيع</h1></p>
  .......................................

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript"> 

var test=  document.getElementById('printing_div').innerHTML;
 printDivCSS = new String ('<style type="text/css">font.test { background-color:gray; } p.inset {border-style: inset;}p.solid {border-style: solid;} table {width: 100%;border-collapse: collapse;border-spacing: 0;margin-bottom: 20px;}table tr:nth-child(2n-1) td {background: #F5F5F5;} table th,table td {text-align: left;}table th {padding: 5px 50px;color: #000000;border-top: 1px solid #C1CED9;white-space: nowrap;        font-weight: normal;} table .service,table .desc {text-align: left;} table td {padding-left: 5px;padding-bottom: 5px; text-align: left;} table td.service,table td.desc { vertical-align: top;}table td.unit,table td.qty,table td.total {font-size: 1.2em;}table td.grand { border-top: 1px solid #5D6975;;}h1 {border-top: 1px solid  #5D6975;border-bottom: 1px solid  #5D6975;color: #000000;font-size: 2.4em;line-height: 1.4em;font-weight: normal;text-align: center;margin: 0 0 20px 0;background: url(dimension.png);} h3 {border-top: 1px solid  #5D6975;border-bottom: 1px solid  #5D6975;color: #5D6975;font-size: 1em;line-height: 1.4em;font-weight: normal;text-align: center;margin: 0 0 20px 0;background: url(dimension.png);} </style>');
 window.frames["print_frame"].document.body.innerHTML=printDivCSS +test;
window.frames["print_frame"].window.focus();
window.frames["print_frame"].window.print();  
 
function printDiv(val1,val2,val3,val4,val5,val6,val7,val8,val9,val10,val11,val12,val13,val14) {

    $('#serial_no_pr').html('<font size="5"><big>#'+val13+'</big></font>');
    $('#phone_pr').html('<font size="5"><big>'+val12+'</big></font>');
  $('#playground_id_pr').html('<font size="5"><big>'+val1+'</big></font>');
  $('#stadium_pr').html('<font size="5"><big>'+val11+'</big></font>');
  $('#user_name_pr').html('<font size="5"><big>'+val2+'</big></font>');
  $('#player_name_pr').html('<font size="5"><big>'+val3+'</big></font>');
  $('#date_pr').html('<font size="5"><big>'+val4+'</big></font>');
  $('#time_pr').html('<font size="5"><big>'+val5+'</big></font>');
  $('#today_pr').html('<font size="5"><big>'+val6+'</big></font>');
  $('#paid_pr').html('<font size="5"><strong>'+ val7+'</strong> ' +' <big>EGP</big></font>' );
  $('#unpaid_pr').html('<font size="5"><strong>'+ val8+'</strong> ' +' <big>EGP</big></font>' );
  $('#discount_pr').html('<font size="5"><strong>'+ val9+'</strong> ' +' <big>EGP</big></font>' );
  $('#total_pr').html('<font size="5"><strong>'+ val10+'</strong> ' +' <big>EGP</big></font>' );
   
window.frames["print_frame"].document.body.innerHTML=printDivCSS +test;
window.frames["print_frame"].window.focus();
window.frames["print_frame"].window.print();  
    

 } 

 

</script>

</body>
</html>
