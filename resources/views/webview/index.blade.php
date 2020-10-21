<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wajad WebView</title>
    <link rel="alternate" href="wajad://api-wajad.smartappco.dev/api/scan-qr-code/{{$qr_code->qrcode_url}}"/>
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
<div >
    <img src="/images/wajad_logo.png" class="logo">
</div>
<div class="container-fluid" style="background-color: #ffffff;">
    <div class="service-40 wrap-feature40-box p-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="card border-0 mb-4">
                    <div class="card-header heads">
                        <h3 style="color: #07a3e2"><strong>ITEM INFORMATION</strong></h3>
                    </div>
                    <div class="card-body bodies">

                        <div class="col-12 col-md-6">
                            <!--customer Details start-->
                            <h3 class="font-weight-bold">
                                <span>Brand: </span></h3>
                            <h4 class="my-3 ">
                                <span >{{$qr_code->item->brand->name_en ?? 'Not Available'}}</span>
                            </h4><br>

                            <!--customer Details end-->
                        </div>
                        <div class="col-12 col-md-6">
                            <!--customer Details start-->
                            <h3 class="font-weight-bold">Model: </h3>
                            <h5 class="my-3 ">
                                <span >{{$qr_code->item->model->name_en ?? 'Not Available'}}</span>
                            </h5><br>
                            <!--customer Details end-->
                        </div>
                        <div class="col-12 col-md-6">
                            <!--customer Details start-->
                            <h3
                                class="font-weight-bold">Color: </h3>
                            <h5 class="my-3 ">
                                <span >{{$qr_code->item->color->name_en ?? 'Not Available'}}</span>
                            </h5><br>
                            <!--customer Details end-->
                        </div>
                        <div class="col-12 col-md-6">
                            <!--customer Details start-->
                            <h3
                                class="font-weight-bold">Item: </h3>
                            <h5 class="my-3 ">
                                <span >{{$qr_code->item->title ?? 'Not Available'}}</span>
                            </h5><br>
                            <!--customer Details end-->
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-12" style="display: inline-block">
                                    @if($qr_code->item)
                                        @foreach($qr_code->item->images as $image)
                                            <img src="{{$image}}" alt="wrapkit" class="img img-fluid rounded my-3 mr-3"
                                                 style="max-width: 47%;
                                            object-fit: cover;" />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!--customer Details start-->
                            <h3
                                class="font-weight-bold">Description: </h3>
                            <h5 class="my-3 ">
                                <span >{{$qr_code->item->details ?? 'Not Available'}}</span>
                            </h5><br>
                            <!--customer Details end-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="">
                    <div class="card border-0 mb-4" >
                        <div class="card-header heads">
                            <h3 style="color: #07a3e2"><strong>OWNER INFORMATION</strong></h3>
                        </div>
                        <div class="card-body bodies" >
                            <div class="col-12 col-md-6">
                                <!--customer Details start-->
                                <h3
                                    class="font-weight-bold">Item Owner: </h3>
                                <h5 class="my-3 ">
                                    <span >{{$qr_code->item->owner->name ?? 'Not Available'}}</span>
                                </h5><br>
                                <!--customer Details end-->
                            </div>
                            <div class="col-12 col-md-6">
                                <!--customer Details start-->
                                <h3
                                    class="font-weight-bold">Contact #: </h3>
                                <h5 class="my-3 ">
{{--                                    <a href="tel:{{$qr_code->item->owner ? '+'. $qr_code->item->owner->country->country_code . $qr_code->item->owner->mobile_number : ''}}">--}}
                                        <span>{{$qr_code->item->owner ? '+'. $qr_code->item->owner->country->country_code . $qr_code->item->owner->mobile_number : 'Not Available'}}</span>
{{--                                    </a>--}}
                                </h5><br>
                                <!--customer Details end-->
                            </div>
                            <div class="col-12 col-md-6">
                                <!--customer Details start-->
                                <h3
                                    class="font-weight-bold">Date: </h3>
                                <h5 class="my-3 ">
                                    <span >{{$qr_code->item->created_at->format('d F Y')}}</span>
                                </h5><br>
                                <!--customer Details end-->
                            </div>
                            <div class="col-12 col-md-6">
                                <!--customer Details start-->
                                <h3
                                    class="font-weight-bold">Item: </h3>
                                <h5 class="my-3 ">
                                    <span >{{$qr_code->item->title ?? 'Not Available'}}</span>
                                </h5><br>
                                <!--customer Details end-->
                            </div>
                            <div class="col-12 col-md-6">
                                <!--customer Details start-->
                                <h3
                                    class="font-weight-bold">Contact The Owner: </h3>
                                <h5 class="my-3 ">
                                    <a href="#"><span >Click Here</span></a>
                                </h5><br>
                                <!--customer Details end-->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="m-3 p-3" style="display: inline-flex; position: relative; bottom: -100%">
                                <a href="#">
                                    <img src="/images/google-play-badge.png"  style=" max-width: 250px" alt="">
                                </a>
                                <a href="#">
                                    <img src="/images/Download-on-the-App-Store-01.png" style="max-width: 250px"  alt="">
                                </a>
                            </div>
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
