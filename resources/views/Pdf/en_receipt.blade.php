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
<img src="images/wajad_logo.png" style="width:25%">
<body class="border">


  <!-- <img src="images/smart_appco_logo2.png">


  <div class="header-right">
  <img src="images/ksa2.png" style="height: 100px;width:200px">
  </div> -->
{{--  <br>--}}
{{--<p class="groove"></p>--}}
{{--<br>--}}



<div style="padding-left:20px">
<br>
  <center><h2><u>Receipt</u></h2> </center>
   I declare that /
        <b> {{GoogleTranslate::trans($post->owner->name ?? "...........................",'en') }} </b>
        on the day ............................ corresponding .............................. .<br> <br>
        That I received my missing item
        <b> {{GoogleTranslate::trans($post->title ,'en')}}</b>  <br> <br>
        With the following specifications :
        <b> {{GoogleTranslate::trans($post->description ?? "..................",'en') }}</b>  <br> <br>
            Of subcategory
        <b> {{$post->subcategory->name_en}} </b>
            Brand
        <b> {{$post->brand->name_en}} </b>
            Model
        <b> {{$post->model->name_en}} </b>
            Color
        <b> {{$post->color->name_en}} </b><br><br>


</div>

<div class="footer">

  <p><h1>Signature</h1></p>
  .......................................
    <br>
    <br>
<p><small>{{$settings['Address1']}} | {{$settings['Phone-Number-1']}} - {{$settings['Address2']}} | {{$settings['Phone-Number-2']}}
    <hr>{{$settings['Email1']}} | {{$settings['Email2']}}</small></p>
</div>
</body>
</html>
