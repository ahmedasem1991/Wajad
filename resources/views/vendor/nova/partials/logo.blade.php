<div class="row">
    <div class="col-12">
        <div class="text-center">
            @if(Auth::check() == false)
                <center> <img
                        src="{{ URL::asset('/images/wajad_logo.png')}}"
                        style="height:50px;width:70px;;margin-left:auto;margin-right: auto;display:block;float:snap"
                        alt="Avatar"></center>
            @else
                <center> <img
                        src="{{Auth::check() && Auth::user()->isCorporateAdmin() ? Auth::user()->corporate->image : URL::asset('/images/wajad_logo.png')}}"
                        style="height:50px;width:70px;margin-left:50px;display:block;float:snap"
                        alt="Avatar"></center>
            @endif
        </div>
    </div>
</div>
