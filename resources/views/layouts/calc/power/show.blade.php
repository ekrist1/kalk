@extends('layouts.app')

@section('meta')
    <title>Hvem tilbyr billigst strøm</title>
    <meta name="description" content="Se hvilke produkter og priser de ulike strømleverandørene tilbyr">
    <meta property="og:url"                content="https://kalkulator.altonline.no/calc/paint" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Hvem tilbyr billigst strøm" />
    <meta property="og:description"        content="Se hvilke produkter og priser de ulike strømleverandørene tilbyr" />
    <meta property="og:image"              content="{{ asset('storage/bmi.jpg') }}" />
@endsection

@section('content')

<power :vendors="{{ $vendors }}" :prices="{{ $prices }}" :elspotaverage="{{ $elspotAveragePrice }}"></power>

@endsection

@push('scripts')
    @include('partials.analytics')
@endpush