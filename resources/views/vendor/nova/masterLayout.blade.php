<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full font-sans antialiased">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
   {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-M6HNJBTMT6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-M6HNJBTMT6');
    </script>--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=1280">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@include('nova-echo::meta') <!-- Include this line -->
    <title>{{ Nova::name() }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('app.css', 'vendor/nova') }}">
    <link rel="stylesheet" href="css/css/font-awesome.css">

    <!-- Tool Styles -->
    @foreach(Nova::availableStyles(request()) as $name => $path)
        <link rel="stylesheet" href="/nova-api/styles/{{ $name }}">
    @endforeach

<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156033330-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-156033330-1');
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body class="min-w-site bg-40 text-black min-h-full">
<div id="nova">
    <div v-cloak class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="min-h-screen flex-none pt-header min-h-screen w-sidebar bg-grad-sidebar px-6">
            <a href="{{ Nova::path() }}">
                <div class="absolute pin-t pin-l pin-r bg-logo flex items-center w-sidebar h-header px-6 text-white">
                    @include('nova::partials.logo')
                </div>
            </a>

            @foreach (Nova::availableTools(request()) as $tool)
                {!! $tool->renderNavigation() !!}
            @endforeach
        </div>

        <!-- Content -->
        <div class="content">
            <div class="flex items-center relative shadow h-header bg-white z-20 px-6">
                <a v-if="'{{ Nova::name() }}'" href="{{ Config::get('nova.url') }}" class="no-underline dim font-bold text-90 mr-6">
                    {{ Nova::name() }}
                </a>

                @if (count(Nova::globallySearchableResources(request())) > 0)
                    <global-search></global-search>
                @endif

                <dropdown class="ml-auto h-9 flex items-center dropdown-right">
                    @include('nova::partials.user')
                </dropdown>
                @include('nova_notification_feed::notification_feed')
            </div>

            <div data-testid="content" class="px-view py-view mx-auto">
                @yield('content')

                @include('nova::partials.footer')
            </div>
        </div>
    </div>
</div>

<script>
    window.config = @json(Nova::jsonVariables(request()));
</script>

<!-- Scripts -->
<script src="{{ mix('manifest.js', 'vendor/nova') }}"></script>
<script src="{{ mix('vendor.js', 'vendor/nova') }}"></script>
<script src="{{ mix('app.js', 'vendor/nova') }}"></script>

<!-- Build Nova Instance -->
<script>
    window.Nova = new CreateNova(config)
</script>

<!-- Tool Scripts -->
@foreach (Nova::availableScripts(request()) as $name => $path)
    @if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://']))
        <script type="text/javascript" src="{!! $path !!}"></script>
    @else
        <script type="text/javascript" src="/nova-api/scripts/{{ $name }}"></script>
    @endif
@endforeach

<!-- Start Nova -->
<script>
    Nova.liftOff();
</script>
</body>
</html>
