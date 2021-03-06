@extends('layouts.app')

@section('meta')
    <title>Produktomtaler av {{ $product->name }}</title>
    <meta name="description" content="Finn ut hva andre mener om {{ $product->name }} eller skriv din egen produktomtale. Sammenlign {{ $product->name }}
            mot tilsvarende produkter og se hvem som kommer best ut i test">
    <meta property="og:url"                content="https://heisann.no/product/{{ $product->slug }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Produktomtaler av {{ $product->name }}" />
    <meta property="og:description"        content="Finn ut hva andre mener om {{ $product->name }} eller skriv din egen produktomtale. Sammenlign {{ $product->name }}
            mot tilsvarende produkter og se hvem som kommer best ut i test" />
    <meta property="og:image"              content="{{ asset('storage/product.jpg') }}" />
@endsection

@section('content')

    <div class="p-3 w-full text-center">
      <a class="font-bold text-blue" href="{{ url('/products') }}">Produkter / </a> <a>{{ $product->name }}</a>
    </div>

    <div id="content" class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">

        @if (session('status'))
                <flash status="{{ session('status') }}"></flash>
        @endif

        <imageslider :initial-images="{{ $images }}"></imageslider>

        <div class="mb-4">
            <h1 itemprop="name" class="block text-grey-dark font-bold text-3xl text-center mt-4 mb-2">
                {{ $product->name }}
            </h1>
            <div class="text-center">
                <toggle text="{{ $product->body }}"></toggle>
            </div>
            <div class="flex mb-4 mt-6">
                <div class="w-full h-12 text-center">
                    <a href="{{ url('/review', [$product->slug]) }}" class="bg-indigo hover:bg-indigo-dark text-white py-2 px-4">Skriv produktvurdering</a>
                    @if ($product->affiliate_url)
                        <a href="{{ $product->affiliate_url }}" class="ml-2 text-blue-dark font-bold">Kjøp (sponset)</a>
                    @endif
                </div>

            </div>
            <div class="mb-4 text-center font-bold text-grey-darker">
                <img src="{{ url('/storage/ic_16_satisfied.svg') }}" alt="Bilde fornøyd"> {{ $product->review_happy_count }} omtaler
                <img src="{{ url('/storage/ic_16_neutral.svg') }}" alt="Bilde passe fornøyd">  {{ $product->review_neutral_count }} omtaler
                <img src="{{ url('/storage/ic_16_dissatisfied.svg') }}" alt="Bilde misfornøyd"> {{ $product->review_dissatisfied_count }} omtaler
            </div>
            <div class="flex flex-wrap">
                @foreach($product->reviews as $review)
                    <div class="flex w-full bg-white border border-grey-light text-blue-dark px-4 py-3 mb-3">
                        <div class="flex-no-grow">
                            @include('partials.reviewsimilies', ['score' => $review->score])
                        </div>
                        <div class="flex-auto ml-4">
                            <p itemprop="description" class="text-grey-darker">{!! nl2br(e($review->body))!!}</p>
                            <p class="text-xs text-grey mt-2">Skrevet av: {{ str_limit(optional($review->user)->name, 3, ' ***') }} - {{ $review->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Product",
      "name": "{{ $product->name }}",
      "aggregateRating": {
        "@type": "AggregateRating",
        "bestRating": "5",
        "worstRating": "1",
        "ratingValue": "{{ $averageReviewScore }}",
        "reviewCount": "{{ count($product->reviews) }}" }
      }
    </script>
@endpush