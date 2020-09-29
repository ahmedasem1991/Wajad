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
            /*border: 2px solid #000;*/
            width: 98%;
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
<img src="images/wajad_logo.png" style="width:25%">
<body class="border">


  <!-- <img src="images/smart_appco_logo2.png">


  <div class="header-right">
  <img src="images/ksa2.png" style="height: 100px;width:200px">
  </div> -->
{{--  <br>--}}
{{--<p class="groove"></p>--}}
{{--<br>--}}



<div style="padding-right:20px" dir="rtl">
<br>
  <center><h2><u>إقرار</u></h2> </center>
 أفر أنا /
        <b> {{GoogleTranslate::trans($post->owner->name ?? "...........................",'ar') }} </b>
        في يوم ............................ الوافق .............................. .<br> <br>
        بأنى استلمت العنصر المفقود الخاص بي
        <b> {{$post->title}}</b>  <br> <br>
            بالمواصفات التالية :
        <b> {{$post->description ?? ".................."}}</b>  <br> <br>
            من فئة
        <b> {{$post->subcategory->name_ar}} </b>
            ماركة
        <b> {{$post->brand->name_ar}} </b>
            موديل
        <b> {{$post->model->name_ar}} </b>
            لون
        <b> {{$post->color->name_ar}} </b><br><br>

 <br><br><br><br><br><br><br><br>
</div>

<div class="footer">
<br><br><br><br><br><br><br><br>
  <p><h1>التوقيع</h1></p>
  .......................................
    <br>
    <br>
    <p><small>{{$settings['Address-1']}} | {{$settings['Phone-Number-1']}} - {{$settings['Address-2']}} | {{$settings['Phone-Number-2']}}
            <hr>{{$settings['Email-1']}} | {{$settings['Email-2']}}</small></p>
</div>
<script type="text/javascript">
window.print();
</script>
</body>
</html>
