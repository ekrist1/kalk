@extends('layouts.app')

@section('meta')
    <title>Altonline - kalkulator</title>
    <meta name="description" content="Prøv våre brukervennlige kalkulatorer">
@endsection


        <!-- fremtidig bruk
        @if(Route::has('login'))
            <div class="absolute pin-t pin-r mt-4 mr-4">
                @auth
                    <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-brand-dark uppercase">Home</a>
                @else
                    <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-brand-dark uppercase pr-6">Login</a>
                    <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-brand-dark uppercase">Register</a>
                @endauth
            </div>
        @endif
            -->

@section('content')
    <div class="mb-4">
        <label class="block text-grey-darker text-lg font-bold text-center" for="tittel">
            Oversikt over Altonlines verktøy
        </label>
    </div>
    <div class="mb-4">
        <p class="text-center">Her finner du en samlet oversikt over kalkulatorer og verktøy.</p>
    </div>
    <div class="bg-grey-background text-center py-4 lg:px-4">
        <a href="{{ url('/calc/bmi') }}">
        <div class="p-2 bg-indigo-darker items-center text-indigo-lightest leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-indigo uppercase px-2 py-1 text-xs font-bold mr-3">Ny</span>
            <span class="font-semibold mr-2 text-left flex-1">Prøv vår BMI-kalkulator</span>
            <svg class="opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </div>
        </a>
        <a href="{{ url('/calc/paint') }}">
            <div class="p-2 bg-indigo-darker items-center text-indigo-lightest leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-indigo uppercase px-2 py-1 text-xs font-bold mr-3">Ny</span>
                <span class="font-semibold mr-2 text-left flex-1">Hvor mye maling trenger du?</span>
                <svg class="opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
            </div>
        </a>
        <a href="{{ url('/calc/power') }}">
            <div class="p-2 bg-indigo-darker items-center text-indigo-lightest leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-indigo uppercase px-2 py-1 text-xs font-bold mr-3">Ny</span>
                <span class="font-semibold mr-2 text-left flex-1">Strømoversikt</span>
                <svg class="opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
            </div>
        </a>
        <a href="#">
            <div class="p-2 bg-indigo-darker items-center text-indigo-lightest leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-indigo uppercase px-2 py-1 text-xs font-bold mr-3">Kommer</span>
                <span class="font-semibold mr-2 text-left flex-1">Meglerpriser</span>
                <svg class="opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
            </div>
        </a>
    </div>

    <div class="text-center py-4 lg:px-4">
        <a class="cursor-pointer" href="https://www.altonline.no">
            <div class="p-2 bg-grey-darkest items-center text-indigo-lightest leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="font-semibold mr-2 text-left flex-1">Tilbake til nyhetssiden Altonline</span>
                <svg class="opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
            </div>
        </a>
    </div>
@endsection

@push('scripts')
    @include('partials.analytics')
@endpush