<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @stack('scripts')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700,900" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="/storage/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/storage/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/storage/favicon-16x16.png">
    <link rel="manifest" href="/storage/manifest.json">
    <link rel="mask-icon" href="/storage/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">


</head>
<body class="flex flex-col bg-grey-background min-h-screen border-indigo border-t-2 font-normal font-family: 'Source Sans Pro', sans-serif">
    <div id="app">
        <nav class="bg-grey-background h-12">
            <div class="container mx-auto h-full">
                <div class="flex items-center justify-center h-12">
                    <div class="mr-6">
                        <a href="{{ url('/') }}" class="no-underline">
                            @include('partials.logo')
                        </a>
                    </div>
                    <div class="flex-1 text-right whitespace-no-wrap">

                        @guest
                            <a class="no-underline hover:underline text-grey-darker pr-3 text-sm" href="{{ url('/login') }}">Logg inn</a>
                            <a class="no-underline hover:underline text-grey-darker text-sm" href="{{ url('/register') }}">Ny bruker</a>
                        @else
                            <span class="text-grey-darker text-sm pr-4">{{ Auth::user()->name }}</span>

                            <a href="{{ route('logout') }}"
                                class="no-underline hover:underline text-grey-darker text-sm"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logg ut</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endguest

                    </div>
                </div>
            </div>
        </nav>

        @include('partials.success')

        @yield('content')

    </div>

    <footer class="text-center text-grey text-xs mt-auto mb-3 px-3"> <p>Nettsiden eies av Altonlin.no -
            <a href="https://www.altonline.no/annonsering">Annonser</a> -
            <a href="https://www.altonline.no/kontakt-oss">Kontakt oss</a> -
            <a href="https://www.altonline.no/personvernerklaering" target="_blank">Personvernerklæring</a>
        </p>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


</body>
</html>
