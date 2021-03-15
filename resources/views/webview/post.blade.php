<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wajad</title>

    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="icon" sizes="16x16 32x32 64x64" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="icon" type="image/png" sizes="196x196" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="icon" type="image/png" sizes="96x96" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="icon" type="image/png" sizes="64x64" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="icon" type="image/png" sizes="32x32" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="icon" type="image/png" sizes="16x16" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="apple-touch-icon" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="apple-touch-icon" sizes="114x114" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="apple-touch-icon" sizes="72x72" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="apple-touch-icon" sizes="144x144" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="apple-touch-icon" sizes="60x60" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="apple-touch-icon" sizes="120x120" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="apple-touch-icon" sizes="76x76" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<link rel="apple-touch-icon" sizes="152x152" href="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<meta name="application-name" content="PayTabs"/>
<meta name="msapplication-TileColor" content="#FFFFFF"/>
<meta name="msapplication-TileImage" content="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<meta name="msapplication-square70x70logo" content="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
<meta name="msapplication-square150x150logo" content="https://wajad-demo.smartappco.dev/images/wajadfinallogo.png"/>
    <link rel="alternate" href="wajad://api-wajad.smartappco.dev/api/share-post/{{$post->id}}" />
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body >


    <script type="application/javascript">
        var lat = 0;
        var lng = 0;
        var city = 0;
        var ip = '127.0.0.1';

        var url=window.location.href;
       
        
        if (navigator.geolocation) {
           // navigator.geolocation.getCurrentPosition(showPosition);
            navigator.geolocation.getCurrentPosition(showPosition,errorCallback,{timeout:3000});
            } else {
            console.log("Geolocation is not supported by this browser.");
            $.getJSON('https://ipapi.co/json/', function(data) {
                ip = data.ip;
                city = data.city;
                lat=data.latitude;
                lng=data.longitude;
                console.log('Not  allow GPS');
                console.log(window.location.href);

                // if (window.location.href.indexOf("lat") == -1 && window.location.href.indexOf("lng") == -1) {
                    if (url.search("lat") == -1 && url.search("lng") == -1) {
                    window.location.href = window.location.href + "?lat=" + lat + '&lng=' + lng+ '&ip=' + ip+ '&device_type=web';
                }


            })
        }


        function errorCallback(position) {
        }
        function showPosition(position) {
            console.log('test allow GPS');
            lat = position.coords.latitude;
            lng = position.coords.longitude;
            $.getJSON('https://ipapi.co/json/', function(data) {
                ip = data.ip;
               if (window.location.href.indexOf("lat") == -1 && window.location.href.indexOf("lng") == -1) {
                    window.location.href = window.location.href + "?lat=" + lat + '&lng=' + lng+ '&ip=' + ip+ '&device_type=web';
                }
            })

 
        }








    </script>


    <!-- <div class="col-md-3 col-sm-3 m-3 p-3  col-md-8">
        <img src="/images/wlogo.png"  style="width:140px;height:70px">
    </div> -->
    <div class="container-fluid col-md-8" style="background-color: #ffffff;">
        <div class="service-40 wrap-feature40-box p-4">
            <div class="row">
            <div class="col-md-3 col-sm-3 m-3 p-3  col-md-8">
        <img src="/images/wlogo.png"  style="width:140px;height:70px">
    </div>
                <div class="col-lg-6">
                    <div class="card border-0 mb-4">
                        <div class="card-header heads">
                            <h6 style="color: #07a3e2"><strong>POST INFORMATION</strong></h6>
                        </div>
                        <div class="card-body bodies">





<table>
<colgroup>
       <col span="1" style="width: 60%;">
       <col span="1" style="width: 40%;">
        
    </colgroup>
<tr>
<td style="vertical-align:top; word-wrap: break-word" >


                             <div class="col-12 col-md-12">
                                <!--customer Details start-->
                                <h6 class="font-weight-bold">
                                    <span>Brand: </span></h6>
                                <h8 class="my-3 ">
                                    <span>{{$post->brand->name_en ?? 'Not Available'}}</span>
                                </h8><br>

                                <!--customer Details end-->
                            </div>
                            <div class="col-12 col-md-12">
                                <!--customer Details start-->
                                <h6 class="font-weight-bold">Model: </h6>
                                <h8 class="my-3 ">
                                    <span>{{$post->model->name_en ?? 'Not Available'}}</span>
                                </h8><br>
                                <!--customer Details end-->
                            </div>
                            <div class="col-12 col-md-12">
                                <!--customer Details start-->
                                <h6 class="font-weight-bold">Color: </h6>
                                <h8 class="my-3 ">
                                    <span>{{$post->color->name_en ?? 'Not Available'}}</span>
                                </h8><br>
                                <!--customer Details end-->
                            </div>

                            <div class="col-12 col-md-12">
                                <!--customer Details start-->
                                <h6 class="font-weight-bold">Post: </h6>
                                <h8 class="my-3 ">
                                    <span>{{$post->title ?? 'Not Available'}}</span>
                                </h8><br>
                                <!--customer Details end-->
                            </div>
                        


                            </td>
                            <td  style="vertical-align:top"><img src="{{env('APP_URL')}}/{{$post->images[0]}}" alt="" class="" style="max-width: 100%;float:right"  /></td>
    </tr>

                   
</table>
<br>




<table>

<div >
                                <div class="row">
                                    <div class="col-12 col-md-12" style="display: inline-block">
                                        @if($post->images)
                                        
                                        @foreach($post->images as $key=> $image)
                                        @if( $key == 0)<tr>@endif
                                        
                                       <td>
                                       <center> <img src="{{$image}}" alt=""  style="max-width:60%;max-height: 200px;
                                            object-fit: cover;" />
                                       </center>  
                                      </td>
                                     
                                      @if($key % 2 != 0 && $key != 0)</tr>@endif
                                   
                                        @endforeach
                                        </tr>
                                        @endif
                                    </div>
                                </div>
                            </div>



</table>

<table>
<colgroup>
       <col span="1" style="width: 60%;">
       <col span="1" style="width: 40%;">
        
    </colgroup>
    <tr>
                    <td>
                    <div class="col-12 col-md-12">
                    <!--customer Details start-->
                    <h6 class="font-weight-bold">Description: </h6>
                    <h8 class="my-3 ">
                    <span>{{$post->description ?? 'Not Available'}}</span>
                    </h8><br>
                    <!--customer Details end-->
                    </div>
                    </td>

                    </tr>
</table>

                      
                            
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-6">
                    <div class="">
                        <div class="card border-0 mb-4">
                            <div class="card-header heads">
                                <h6 style="color: #07a3e2"><strong>PUBLISHER INFORMATION</strong></h6>
                            </div>
                            <div class="card-body bodies">
                                <div class="col-12 col-md-6">
                                    <!--customer Details start-->
                                    <h6 class="font-weight-bold">NAME: </h6>
                                    <h8 class="my-3 ">
                                    @if($post->publisher)
                                        <span>{{$post->publisher->name ?? 'Not Available'}}</span>
                                        @endif
                                    </h8><br>
                                    <!--customer Details end-->
                                </div>
                                <div class="col-12 col-md-6">
                                    <!--customer Details start-->
                                    <h6 class="font-weight-bold">Contact #: </h6>
                                    <h8 class="my-3 ">
                                        {{-- <a href="tel:{{$post->publisher ? '+'. $post->publisher->country->country_code . $post->publisher->mobile_number : ''}}">--}}
                                        <span>{{!empty($post->publisher) ? '+'. $post->publisher->country->country_code . $post->publisher->mobile_number : 'Not Available'}}</span>
                                        {{-- </a>--}}
                                    </h8><br>
                                    <!--customer Details end-->
                                </div>
                                <div class="col-12 col-md-6">
                                    <!--customer Details start-->
                                    <h6 class="font-weight-bold">Date: </h6>
                                    <h8 class="my-3 ">
                                        <span>{{!empty($post) ? $post->created_at->format('d F Y') : 'Not Available'}}</span>
                                    </h8><br>
                                    <!--customer Details end-->
                                </div>
                                <div class="col-12 col-md-6">
                                    <!--customer Details start-->
                                    <h6 class="font-weight-bold">Title: </h6>
                                    <h8 class="my-3 ">
                                        <span>{{$post->title ?? 'Not Available'}}</span>
                                    </h8><br>
                                    <!--customer Details end-->
                                </div>
                                <div class="col-12 col-md-6">
                                    <!--customer Details start-->
                                    <!-- <h6 class="font-weight-bold">Contact The Owner: </h6>
                                    <h8 class="my-3 ">
                                        <a href="#"><span>Click Here</span></a>
                                    </h8><br> -->
                                    <!--customer Details end-->
                                </div>
                            </div>

                        </div>
                        <div class="container-fluid col-lg-6 " style="display: inline;" >
                            <div class="container-fluid"  >
                          <center>
                                <a href="#">
                                <!-- <center> -->
                                  <img src="/images/GoogleAppStore.png" style="width:100px;height:40px;padding-left:" alt=""> 
                                  <!-- </center>   -->
                                </a>
                              
                               
                                <a href="#">
                                <!-- <center> -->
                                   <img src="/images/AppleAppStore.png" style="width:100px;height:40px" alt="">
                                   <!-- </center> -->
                                     </a>
                                     </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a380da6aa4.js" crossorigin="anonymous"></script>

</body>

</html>