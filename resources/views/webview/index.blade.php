<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wajad WebView</title>
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
</head>

<body>
<div class="service-40 wrap-feature40-box">
    <div class="container" style="background-color: #ffffff;">
        <div class="row">
            <div class="col-lg-6">
                <div class="card border-0 mb-4">
                    <div class="card-body">
                            <span class="badge badge-danger rounded-pill px-3 py-1 font-weight-bold">Date
                                <span class="font-weight-light">
                                @if($qr_code->item)
                                {{$qr_code->item->created_at}}
                                @endif
                                </span>
                            </span>
                        <h3 class="my-3 text-uppercase">
                            <span class="font-weight-bold">
                            @if($qr_code->item)
                                {{$qr_code->item->title}}
                                @endif
                            </span>
                            @if($qr_code->item)
                            {{$qr_code->item->color->name_en}}
                            @endif
                        </h3>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <!--customer Details start-->
                                <span
                                    class="badge badge-primary rounded-pill px-3 py-2 font-weight-light">Owner</span>
                                <h5 class="my-3 ">
                                    <span class="font-weight-bold">{{$qr_code->user->name ?? 'Not Available'}}</span>
                                </h5>
                                <!--customer Details end-->
                            </div>
                        </div>


                        <span class="badge badge-primary rounded-pill px-3 py-2 font-weight-light">Phone no.</span>
                        <h5 class="my-3 ">
                            <span class="font-weight-bold">{{$qr_code->user ? $qr_code->user->country->country_code . $qr_code->user->mobile_number : 'Not Available'}}</span>
                        </h5>
                        <hr>
                        <h3 class="my-3 text-uppercase">
                            <span class="font-weight-bold">
                            Item Details
                            </span>
                        </h3>
                        <p class="my-4">
                        @if($qr_code->item)
                            {{$qr_code->item->details}}
                        @endif
                        </p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <!--customer Details start-->
                                <span
                                    class="badge badge-primary rounded-pill px-3 py-2 font-weight-light">Brand</span>
                                <h5 class="my-3 ">
                                    <span class="font-weight-bold">{{$qr_code->item->brand->name_en ?? 'Not Available'}}</span>
                                </h5>
                                <!--customer Details end-->
                            </div>
                            <div class="col-12 col-md-6">
                                <!--customer Details start-->
                                <span
                                    class="badge badge-primary rounded-pill px-3 py-2 font-weight-light">Model</span>
                                <h5 class="my-3 ">
                                    <span class="font-weight-bold">{{$qr_code->item->model->name_en ?? 'Not Available'}}</span>
                                </h5>
                                <!--customer Details end-->
                            </div>
                            <div class="col-12 col-md-6">
                                <!--customer Details start-->
                                <span
                                    class="badge badge-primary rounded-pill px-3 py-2 font-weight-light">Color</span>
                                <h5 class="my-3 ">
                                    <span class="font-weight-bold">{{$qr_code->item->color->name_en ?? 'Not Available'}}</span>
                                </h5>
                                <!--customer Details end-->
                            </div>
                        </div>

                        <h5 class="my-3 mb-4">
                            <span class="font-weight-bold">Download Now</span>
                        </h5>

                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-info-gradiant btn-md btn-rounded border-0 text-white" href="#f40">
                                    <i class="fab fa-android"></i>
                                    <span>Play store</span></a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-info-gradiant btn-md btn-rounded border-0 text-white "
                                   href="#f40"><i class="fab fa-apple"></i>

                                    <span>App store</span></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            @if($qr_code->item)
                @foreach($qr_code->item->images as $image)
                    <img src="{{$image}}" alt="wrapkit" class="img-fluid rounded my-3" id="product-img" />
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/a380da6aa4.js" crossorigin="anonymous"></script>

</body>

</html>
