@extends('layouts.app')

@section('meta')
    <title>Heisann - vi hjelper deg</title>
    <meta name="description" content="Heisann hjelper deg med å finne de beste avtalene enten det gjelder mobilabonnement, strøm eller kredittkort. Prøv også være brukervennlige kalkulatorer">
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Heisann - vi hjelper deg" />
    <meta property="og:description"        content="Heisann hjelper deg med å finne de beste avtalene enten det gjelder mobilabonnement, strøm eller kredittkort" />
    <meta property="og:image"              content="{{ asset('storage/background.jpg') }}" />
@endsection


        <!-- login
        @if(Route::has('login'))
            <div class="absolute pin-t pin-r mt-4 mr-4">
                @auth
                    <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-brand-dark uppercase">Home</a>
                @else
                    <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-brand-dark uppercase pr-6">Logg inn</a>
                    <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-brand-dark uppercase">Ny bruker</a>
                @endauth
            </div>
        @endif
        -->

@section('content')
    <div class="fehome bg-no-repeat bg-cover bg-center min-h-screen">
        <div class="mb-4">
            <label class="block text-white text-4xl font-bold text-center pt-4 text-shadow-white" for="tittel">
                Heisann - vi hjelper deg.
            </label>
        </div>
        <div class="mb-8">
            <p class="text-center text-white text-shadow-white">Heisann hjelper deg å finne de beste produktene. Prøv også ut våre nyttige kalkulatorer.</p>
        </div>

        <div class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
            <div class="flex flex-wrap -mx-2 justify-center">
                <div class="w-40 md:w-48 pr-2 pb-2">
                    <a href="{{ url('/calc/bmi') }}">
                        <div class="bg-grey-lightest h-32 text-center opacity-75 hover:bg-indigo-lightest">
                            <img src="/storage/ic_bmi.svg" class="mt-4">
                            <p class="font-bold mt-2 text-grey-darkest">BMI kalkulator</p>
                        </div>
                    </a>
                </div>
                <div class="w-40 md:w-48 pr-2 pb-2">
                    <a href="{{ url('/calc/paint') }}">
                        <div class="bg-grey-lightest h-32 text-center opacity-75 hover:bg-indigo-lightest">
                            <img src="/storage/ic_paint.svg" class="mt-4">
                            <p class="font-bold mt-2 text-grey-darkest">Malekalkulator</p>
                        </div>
                    </a>
                </div>
                <div class="w-40 md:w-48 pr-2 pb-2">
                    <a href="{{ url('/calc/creditcard') }}">
                        <div class="bg-grey-lightest h-32 text-center opacity-75 hover:bg-indigo-lightest">
                            <img src="/storage/ic_credit.svg" class="mt-4">
                            <p class="font-bold mt-2 text-grey-darkest">Finn beste kredittkort</p>
                        </div>
                    </a>
                </div>
                <div class="w-40 md:w-48 pr-2 pb-2">
                    <a href="{{ url('/calc/power') }}">
                        <div class="bg-grey-lightest h-32 text-center opacity-75 hover:bg-indigo-lightest">
                            <img src="/storage/ic_power.svg" class="mt-4">
                            <p class="font-bold mt-2 text-grey-darkest">Finn beste strømavtale</p>
                        </div>
                    </a>
                </div>
                <div class="w-40 md:w-48 pr-2 pb-2">
                    <a href="{{ url('/calc/mobile') }}">
                        <div class="bg-grey-lightest h-32 text-center opacity-75 hover:bg-indigo-lightest">
                            <img src="/storage/ic_phone.svg" class="mt-4">
                            <p class="font-bold mt-2 text-grey-darkest">Beste mobilavtale</p>
                        </div>
                    </a>
                </div>
                <div class="w-40 md:w-48 pr-2 pb-2">
                    <a href=" {{ url('/products') }}">
                        <div class="bg-grey-lightest h-32 text-center opacity-75 hover:bg-indigo-lightest">
                            <img src="/storage/ic_product.svg" class="mt-4">
                            <p class="font-bold mt-2 text-grey-darkest">Produktomtaler (beta)</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div class="text-center py-4 sm:px-4">
            <a class="cursor-pointer" href="https://www.altonline.no">
                <div class="p-2 bg-grey-darkest items-center text-indigo-lightest leading-none sm:rounded-full flex sm:inline-flex" role="alert">
                    <span class="font-semibold mr-2 text-left flex-auto">Til nyhetssiden Altonline</span>
                    <svg class="opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" fill="#FFF" /></svg>
                </div>
            </a>
        </div>

    </div>
@endsection

@push('scripts')
    @include('partials.analytics')
@endpush