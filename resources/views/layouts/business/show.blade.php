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
        <div class="mb-4">
            <h1 itemprop="name" class="block text-grey-dark font-bold text-3xl text-center mt-4 mb-2">
                Demobedriften selskap as
            </h1>
            <div class="text-center">
                <toggle text="variabel"></toggle>
            </div>
            <div class="flex mb-4 mt-6">
                <div class="w-full h-12 text-center">
                    <a href="#" class="bg-indigo hover:bg-indigo-dark text-white py-2 px-4">Ny omtale</a>
                    <a href="#" class="ml-2 text-blue-dark font-bold">Kjøp (sponset)</a>
                </div>

            </div>
        </div>

        <div class="flex justify-center">
            <div class="text-grey-darker text-center bg-grey-light px-4 py-2 m-2">
                <h2 class="text-5xl">0</h2>
                <p>stillinger</p>
            </div>
            <div class="text-grey-darker text-center bg-grey-light px-4 py-2 m-2">
                <h2 class="text-5xl">0</h2>
                <p>omtaler</p>
            </div>
            <div class="text-grey-darker text-center bg-grey-light px-4 py-2 m-2">
                <h2 class="text-5xl">0</h2>
                <p>tilbud</p>
            </div>
        </div>
    </div>

@endsection