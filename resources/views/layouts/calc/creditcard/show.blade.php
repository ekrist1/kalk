@extends('layouts.app')

@section('meta')
    <title>Stor oversikt over priser og renter på kredittkort</title>
    <meta name="description" content="Finn ut hva kredittkortet koster deg og hvilke kort som gir de beste fordelene">
    <meta property="og:url"                content="https://kalkulator.altonline.no/calc/creditcard" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Stor oversikt over priser og renter på kredittkort" />
    <meta property="og:description"        content="Finn ut hva kredittkortet koster deg og hvilke kort som gir de beste fordelene" />
    <meta property="og:image"              content="{{ asset('storage/bmi.jpg') }}" />
@endsection

@section('content')

    <div id="content" class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
        <div class="mb-4">
            <label class="block text-blue-dark text-3xl font-light text-center">
                Finn ut hva kredittkortet koster deg og hvilke kort som gir de beste fordelene
            </label>
        </div>

        <div class="container mx-auto text-center">
            <img src="/storage/credit.svg" alt="Bilde av kreditt" height="350px">
        </div>

        <ul class="list-reset flex">
            <li class="mr-6">
                <a class="text-green font-bold hover:text-green-darker border-b-4 border-green-dark" href="#creditcard">Kredittkortoversikt</a>
            </li>
            <li class="mr-6">
                <a class="text-green font-bold hover:text-green-darker border-b-4 border-green-dark" href="#about">Om kredittkort</a>
            </li>
        </ul>

        <div class="mt-4">
            <p>Kredittkort er et betalingskort som gir deg kreditt ved betaling av varer og tjenester. Som forbruker spare penger ved å velge det rette kredittkortet. </p>
        </div>
        <div class="mt-4">
            <p>Når du kjøper varer og tjenester låner du penger av banken eller kredittforetaket. Rentesatsen på kredittkort er svært høy og
                ofte høyre enn vanlige forbrukslån. Det er også fordeler med å bruke kredittkort. Mange selskap tilbyr en rentefri
                periode der du ikke betaler rente for pengene du låner. En annen fordel er at mange kort har reiseforsikring inkludert
                om du bruker kortet til å kjøpe reisen.</p><br>
        </div>
        <div class="mt-4">
        </div>

        <creditcard :initial-creditcards="{{ $creditcards }}"></creditcard>

        <div id="prices" class="mt-4">
            <h3 class="text-lg">Om kredittkort</h3>
            <p class="mt-3">I Norge finnes det flere hundre ulike typer kredittkort. Vår oversikt gir det muligheten til å velge
                det kredittkortet som passer deg best.</p>
        </div>

    </div>

@endsection

@push('scripts')
    @include('partials.analytics')
@endpush