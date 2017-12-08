@extends('layouts.app')

@section('meta')
    <title>BMI kalkulator</title>
    <meta name="description" content="Med vår BMI-kalkulator finner du raskt ut om du er overvektig eller undervektig.">
    <meta property="og:url"                content="https://heisann.no/calc/bmi" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="BMI kalkulator" />
    <meta property="og:description"        content="Med vår BMI-kalkulator finner du raskt ut om du er overvektig eller undervektig" />
    <meta property="og:image"              content="{{ asset('storage/bmi.jpg') }}" />
@endsection

@section('content')

<calc-bmi></calc-bmi>

@endsection

@push('scripts')
    @include('partials.analytics')
@endpush

