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

    <script>
// $(document).ready(function(){
//     if(window.matchMedia("(max-width: 767px)").matches){
//         // The viewport is less than 768 pixels wide
//         alert("This is a mobile device.");
//     } else{
//         // The viewport is at least 768 pixels wide
//         alert("This is a tablet or desktop.");
//     }
// });
</script>
<script>
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 alert('mobile');
 //window.open('android-app://com.smartappco.wajad,"_self"');
 //window.open("intent://facebook?id=" + '' + "#Intent;scheme=https;package=com.smartappco.wajad;S.browser_fallback_url=https%3A%2F%2Fplay.google.com%2;end");
 //setTimeout(function () { window.location = "https://itunes.apple.com/appdir"; }, 25);
 window.open('twitter://user?screen_name=gajotres', '_system', 'location=no');
}
else{
    alert('desktop');
    //window.location="intent://wajad?id=" + 'token' + "#Intent;scheme=wajad;package=wajad;S.browser_fallback_url=https%3A%2F%2Fplay.google.com%2;end";
    window.location = "fb://";
}
</script>
    <script >
//         console.log('test');
//        // window.location.replace("wajad://api-wajad.smartappco.dev/api/scan-qr-code/{{$qr_code->qrcode_url}}");
//         window.mobileCheck = function() {
//   let check = false;
//   (function(a){
//       if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
//   window.location.replace("wajad://api-wajad.smartappco.dev/api/scan-qr-code/{{$qr_code->qrcode_url}}");
//   alert("This is a mobile device.");
//   console.log('check');
// };

        </script>
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
