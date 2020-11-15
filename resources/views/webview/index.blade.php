<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wajad WebView</title>
    <link rel="alternate" href="wajad://api-wajad.smartappco.dev/api/scan-qr-code/{{$qr_code->qrcode_url}}" />
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

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
            } else {
            console.log("Geolocation is not supported by this browser.");
            $.getJSON('https://ipapi.co/json/', function(data) {
                ip = data.ip;
                city = data.city;
                lat=data.latitude;
                lng=data.longitude;
                console.log('Not  allow GPS');

                if (window.location.href.indexOf("lat") == -1 && window.location.href.indexOf("lng") == -1) {
                    window.location.href = window.location.href + "?lat=" + lat + '&lng=' + lng+ '&ip=' + ip+ '&device_type=web';
                }


            })
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


    <div class="col-md-3 col-sm-3 m-3 p-3">
        <img src="/images/wlogo.png"  style="width:140px;height:70px">
    </div>
    <div class="container-fluid" style="background-color: #ffffff;">
        <div class="service-40 wrap-feature40-box p-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card border-0 mb-4">
                        <div class="card-header heads">
                            <h6 style="color: #07a3e2"><strong>ITEM INFORMATION</strong></h6>
                        </div>
                        <div class="card-body bodies">

<table>
<colgroup>
       <col span="1" style="width: 60%;">
       <col span="1" style="width: 40%;">
        
    </colgroup>
<tr>
<td >

                             <div class="col-12 col-md-12">
                                <!--customer Details start-->
                                <h6 class="font-weight-bold">
                                    <span>Brand: </span></h6>
                                <h8 class="my-3 ">
                                    <span>{{$qr_code->item->brand->name_en ?? 'Not Available'}}</span>
                                </h8><br>

                                <!--customer Details end-->
                            </div>
                            <div class="col-12 col-md-12">
                                <!--customer Details start-->
                                <h6 class="font-weight-bold">Model: </h6>
                                <h8 class="my-3 ">
                                    <span>{{$qr_code->item->model->name_en ?? 'Not Available'}}</span>
                                </h8><br>
                                <!--customer Details end-->
                            </div>
                            <div class="col-12 col-md-12">
                                <!--customer Details start-->
                                <h6 class="font-weight-bold">Color: </h6>
                                <h8 class="my-3 ">
                                    <span>{{$qr_code->item->color->name_en ?? 'Not Available'}}</span>
                                </h8><br>
                                <!--customer Details end-->
                            </div>

                            <div class="col-12 col-md-12">
                                <!--customer Details start-->
                                <h6 class="font-weight-bold">Item: </h6>
                                <h8 class="my-3 ">
                                    <span>{{$qr_code->item->title ?? 'Not Available'}}</span>
                                </h8><br>
                                <!--customer Details end-->
                            </div>
                        


                            </td>
                            <td style="padding=10px"><img src="{{env('APP_URL')}}/{{$qr_code->image}}" alt="" class="" style="max-width: 100%;float:right"  /></td>
</tr>

                    <tr>
                    <td>
                    <div class="col-12 col-md-12">
                    <!--customer Details start-->
                    <h6 class="font-weight-bold">Description: </h6>
                    <h8 class="my-3 ">
                    <span>{{$qr_code->item->details ?? 'Not Available'}}</span>
                    </h8><br>
                    <!--customer Details end-->
                    </div>
                    </td>

                    </tr>
</table>
<br>
<table>

<div >
                                <div class="row">
                                    <div class="col-12 col-md-12" style="display: inline-block">
                                        @if($qr_code->item)
                                        
                                        @foreach($qr_code->item->images as $key=> $image)
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
                      
                            
                        </div>
                    </div>
                </div>
                <br>.
                <div class="col-lg-6">
                    <div class="">
                        <div class="card border-0 mb-4">
                            <div class="card-header heads">
                                <h6 style="color: #07a3e2"><strong>OWNER INFORMATION</strong></h6>
                            </div>
                            <div class="card-body bodies">
                                <div class="col-12 col-md-6">
                                    <!--customer Details start-->
                                    <h6 class="font-weight-bold">Item Owner: </h6>
                                    <h8 class="my-3 ">
                                        <span>{{$qr_code->item->owner->name ?? 'Not Available'}}</span>
                                    </h8><br>
                                    <!--customer Details end-->
                                </div>
                                <div class="col-12 col-md-6">
                                    <!--customer Details start-->
                                    <h6 class="font-weight-bold">Contact #: </h6>
                                    <h8 class="my-3 ">
                                        {{-- <a href="tel:{{$qr_code->item->owner ? '+'. $qr_code->item->owner->country->country_code . $qr_code->item->owner->mobile_number : ''}}">--}}
                                        <span>{{!empty($qr_code->item->owner) ? '+'. $qr_code->item->owner->country->country_code . $qr_code->item->owner->mobile_number : 'Not Available'}}</span>
                                        {{-- </a>--}}
                                    </h8><br>
                                    <!--customer Details end-->
                                </div>
                                <div class="col-12 col-md-6">
                                    <!--customer Details start-->
                                    <h6 class="font-weight-bold">Date: </h6>
                                    <h8 class="my-3 ">
                                        <span>{{!empty($qr_code->item) ? $qr_code->item->created_at->format('d F Y') : 'Not Available'}}</span>
                                    </h8><br>
                                    <!--customer Details end-->
                                </div>
                                <div class="col-12 col-md-6">
                                    <!--customer Details start-->
                                    <h6 class="font-weight-bold">Item: </h6>
                                    <h8 class="my-3 ">
                                        <span>{{$qr_code->item->title ?? 'Not Available'}}</span>
                                    </h8><br>
                                    <!--customer Details end-->
                                </div>
                                <div class="col-12 col-md-6">
                                    <!--customer Details start-->
                                    <h6 class="font-weight-bold">Contact The Owner: </h6>
                                    <h8 class="my-3 ">
                                        <a href="#"><span>Click Here</span></a>
                                    </h8><br>
                                    <!--customer Details end-->
                                </div>
                            </div>

                        </div>
                        <div>
                            <div class="mt-3" style="display: inline-flex; position: relative; float: right">
                             
                                <a href="#">
                                <center>   <img src="/images/GoogleAppStore.png" style=" max-width: 80%" alt="">  </center>
                                </a>
                                <a href="#">
                                <center>    <img src="/images/AppleAppStore.png" style="max-width: 80%" alt="">
                               
                                    </center> </a>
                              
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