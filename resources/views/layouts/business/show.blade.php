@extends('layouts.app')

@section('meta')
    <title></title>
    <meta name="description" content="Finn ut hva andre mener om yyzzxx">
    <meta property="og:url"                content="https://heisann.no/product/url-slug}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Produktomtaler av xxyyzz}" />
    <meta property="og:description"        content="Her kommer det tekst" />
    <meta property="og:image"              content="{{ asset('storage/product.jpg') }}" />
@endsection

@section('content')

    <div class="p-3 w-full text-center">
        <a class="font-bold text-blue" href="{{ url('/products') }}">Bedrifter / </a> <a>Variabel</a>
    </div>

    <div id="content" class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">

    </div>

@endsection