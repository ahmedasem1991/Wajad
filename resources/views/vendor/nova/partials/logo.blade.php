<div class="row">
    <div class="col-12">
        <div class="text-center">
            
        @if (\Route::currentRouteName()=='nova.')  
        <img src="{{URL::asset('/images/wajad_logo.png')}}" style="height:50px;width:70px;margin:3px;display:inline-block;float:;" alt="Avatar">
        @else
        <img src="{{URL::asset('/images/wajad_logo.png')}}" style="height:50px;width:70px;margin:3px;display:inline-block;float:left;" alt="Avatar">
        <strong style="display:inline-block; padding-top: 20px">Admin Panel</strong> 
        @endif

            
        </div>
    </div>
</div>