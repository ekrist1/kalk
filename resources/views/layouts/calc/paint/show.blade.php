@extends('layouts.app')

@section('meta')
    <title>Hvor mye maling behøver du</title>
    <meta name="description" content="Finn ut hvor mye maling du behøver ved innedørsmaling">
    <meta property="og:url"                content="https://kalkulator.altonline.no/calc/paint" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Hvor mye maling behøver du" />
    <meta property="og:description"        content="Finn ut hvor mye maling du behøver ved innedørsmaling" />
    <meta property="og:image"              content="{{ asset('storage/bmi.jpg') }}" />
@endsection

@section('content')

    <calc-paint></calc-paint>

@endsection

@push('scripts')
    @include('partials.analytics')
@endpush