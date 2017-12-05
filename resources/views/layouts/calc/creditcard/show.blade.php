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
    <creditcard :initial-creditcards="{{ $creditcards }}"></creditcard>
@endsection

@push('scripts')
    @include('partials.analytics')
@endpush