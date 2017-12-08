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

    <title>{{ config('app.name', 'Altonline') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700,900" rel="stylesheet">

</head>
<body class="flex flex-col bg-grey-background min-h-screen border-indigo border-t-2 font-normal font-family: 'Source Sans Pro', sans-serif">
    <div id="app">
        <nav class="bg-grey-background h-12">
            <div class="container mx-auto h-full">
                <div class="flex items-center justify-center h-12">
                    <div class="mr-6">
                        <a href="{{ url('/') }}" class="no-underline">
                            <img src="{{ asset('storage/altlogo.png') }}" alt="{{ config('app.name', 'Altonline') }}">
                        </a>
                    </div>
                    <div class="flex-1 text-right">
                       <!-- fremtidig bruk
                        @guest
                            <a class="no-underline hover:underline text-grey-darker pr-3 text-sm" href="{{ url('/login') }}">Login</a>
                            <a class="no-underline hover:underline text-grey-darker text-sm" href="{{ url('/register') }}">Register</a>
                        @else
                            <span class="text-grey-darker text-sm pr-4">{{ Auth::user()->name }}</span>

                            <a href="{{ route('logout') }}"
                                class="no-underline hover:underline text-grey-darker text-sm"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endguest

                           -->
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>

    <footer class="text-center text-grey text-xs mt-auto mb-3 px-3"> <p>Nettsiden eies av Altonlin.no -
            <a href="https://www.altonline.no/annonsering">Annonser</a> - <a href="https://www.altonline.no/kontakt-oss">Kontakt oss</a>
        </p>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


</body>
</html>
