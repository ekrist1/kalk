@extends('layouts.app')

@section('meta')
    <title>Hvem tilbyr billigst strøm</title>
    <meta name="description" content="Altonline har samlet spotprisene fra de ulike strømleverandørene.
    Finn den billigste strømleverandøren og beregn strømkostnadene dine">
    <meta property="og:url"                content="https://kalkulator.altonline.no/calc/power" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Beregn strømkostnadene dine og finn biligste strømleverandør" />
    <meta property="og:description"        content="Altonline har samlet spotprisene fra de ulike strømleverandørene.
    Finn den billigste strømleverandøren og beregn strømkostnadene dine" />
    <meta property="og:image"              content="{{ asset('storage/energy.png') }}" />
@endsection

@section('content')

<power :initial-vendors="{{ $vendors }}" :prices="{{ $prices }}" :elspotaverage="{{ $elspotAveragePrice }}"></power>

@endsection

@push('scripts')
    @include('partials.analytics')
@endpush