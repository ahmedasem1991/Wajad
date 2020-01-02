@foreach ($models as $model) 
<center>

 
 <img style="height: 200px;width:200px" src="{{env('APP_URL')}}/{{$model->image}}">
</center>
@endforeach
   