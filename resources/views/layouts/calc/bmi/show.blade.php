@extends('layouts.app')

@section('meta')
    <title>BMI kalkulator</title>
    <meta name="description" content="Med vår BMI-kalkulator finner du raskt ut om du er overvektig eller undervektig.">
    <meta property="og:url"                content="https://kalkulator.altonline.no/calc/bmi" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="BMI kalkulator" />
    <meta property="og:description"        content="Med vår BMI-kalkulator finner du raskt ut om du er overvektig eller undervektig" />
    <meta property="og:image"              content="{{ url('bmi.jpg') }}" />
@endsection

@section('content')

<calc-bmi></calc-bmi>

@endsection

