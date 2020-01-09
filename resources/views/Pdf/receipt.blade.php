<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"> 
    <title>Wajad</title>
</head>
<body>
  <div class="container">
    <header>
      @include('partials.header')
    </header>
    <div id="main" class="row" style="float:right; text-align:right;">
    {{$post->title}}
    </div>
    <footer>
        @include('partials.footer')  
    </footer>
  </div>
</body>
</html>
