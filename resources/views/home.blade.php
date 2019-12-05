@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! QrCode::size(250)->generate('ItSolutionStuff.com'); !!}
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
<script src="//js.pusher.com/3.0/pusher.min.js"></script>
<script>
var pusher = new Pusher("{{env("PUSHER_APP_KEY")}}", {
    encrypted: true
});
var channel = pusher.subscribe('test-channel');
channel.bind('test-event', function(data) {
  alert(data.text);
 console.log(data.text);
});
</script> -->
@endsection
