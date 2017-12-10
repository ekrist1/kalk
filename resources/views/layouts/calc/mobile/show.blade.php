@extends('layouts.app')

@section('meta')
    <title>Finn det beste og billigste mobilabonnementet</title>
    <meta name="description" content="På Heisann kan du enkelt sammenligne ulike mobilabonnement og finne det beste mobilabonnementet">
    <meta property="og:url"                content="https://heisann.no/calc/mobile" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Finn det beste og billigste mobilabonnementet" />
    <meta property="og:description"        content="På Heisann kan du enkelt sammenligne ulike mobilabonnement og finne det beste mobilabonnementet" />
    <meta property="og:image"              content="{{ asset('storage/mobile.jpg') }}" />
@endsection

@section('content')

    <div id="content" class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
        <div class="mb-4">
            <label class="block text-grey-dark font-bold text-3xl text-center">
                Sammenlign mobilabonnement og finn det beste mobilabonnementet
            </label>
        </div>

        <div class="container mx-auto text-center">
            <img src="/storage/mobilesubscription.svg" alt="Bilde av kreditt" height="350px">
        </div>

        <ul class="list-reset flex">
            <li class="mr-6">
                <a class="text-green font-bold hover:text-green-darker border-b-4 border-green-dark" href="#mobilesubscription">Mobilabonnement</a>
            </li>
            <li class="mr-6">
                <a class="text-green font-bold hover:text-green-darker border-b-4 border-green-dark" href="#about">Om mobilabonnement</a>
            </li>
        </ul>

        <div class="mt-4">
            <p>De fleste mobilabonnement kommer i dag med fri tale, MMS og SMS inkludert. Fra sommeren 2017 er det heller ikke tillatt for teleoperatørene
            og ta betalt ekstra for molbilbruk innefor EU / EØS</p>
        </div>
        <div class="mt-4">
            <p>I Norge finnes det kun 3 mobilnett. Selv om det er fri konkurranse der mobiloperatører uten eget nett kan tilby
            mobiltjenester, så er konkurransen på mobilnett begrenset i Norge.</p><br>
        </div>
        <div id="mobilesubscription" class="mt-4">
        </div>

        <mobile :initial-mobile-subscriptions="{{ $mobilesubscriptions }}"></mobile>


        <div id="about" class="mt-4">
            <h3 class="text-lg">Om mobilabonnement</h3>
            <p class="mt-3">Det er enkelt å bytte mobilabonnement i Norge. Dersom du ikke er bundet opp av bindingstid kan du
            ta kontakt med ny mobilleverandør som vil foreta bytte fra eksisterende leverandør. Du eier i dag mobilnummeret ditt og
            du kan ta nummeret med deg over til nye mobilleverandør.</p>
            <p class="mt-3">Dersom du har bindingstid må du som oftest kjøpe ut resterende bindingstid før du kan bytte over til ny
            mobilleverandør.</p>
        </div>

    </div>

@endsection

@push('scripts')
    @include('partials.analytics')
@endpush