@extends('layouts.app')

@section('content')
    <form action="" method="GET">
        <div class="flex">
            <div class="flex-grow text-grey-darker text-center px-1 py-2 ml-2 mb-2 mt-2">
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker h-12" type="text" name="keyword" placeholder="Søk etter produkt" >
            </div>
            <div class="flex-no-grow text-grey-darkest text-center py-2 mb-2 mt-2 mr-2">
                <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded h-12">Søk</button>
            </div>
        </div>
    </form>
    <product-categories inline-template>
        <div class="text-center">
            <a href="#" @click="toggle = !toggle" class="font-bold text-blue">@{{ toggle ? shotLessText : showMoreText }}</a>
            <p class="mt-4" v-if="toggle">
                @foreach($categories as $category)
                    <a class="text-indigo font-bold ml-3" href="{{ url('/products?category=')}}{{ $category->name }}"> > {{ $category->name }}</a>
                @endforeach
            </p>
        </div>
    </product-categories>
    <div class="px-2 mb-4">
            @if (Request::get('keyword'))
                <p><strong>Gjeldende søkeord:</strong> {{ Request::get('keyword') }}</p>
                <a href="{{ url()->current() }}">Nullstil søk</a>
            @endif
    </div>
    <div class="px-2">
        <div class="flex flex-wrap -mx-2">
           @foreach($products as $product)
            <div class="sm:w-full md:w-1/3 px-2 mb-4">
                <a href="{{ route('showproduct', ['slug' => $product->slug]) }}">
                <div class="h-32 p-3 bg-white shadow-lg rounded overflow-hidden">
                    <h4 class="text-xl mb-3 text-grey-darker">{{ $product->name }}</h4>
                    <div class="mb-4 text-left font-bold text-grey-darker">
                        <img src="{{ url('/storage/ic_16_satisfied.svg') }}"> {{ $product->review_happy_count }} {{ $product->review_happy_count === 1 ? 'omtale' : 'omtaler' }}
                        <img src="{{ url('/storage/ic_16_neutral.svg') }}">  {{ $product->review_neutral_count }} {{ $product->review_neutral_count === 1 ? 'omtale' : 'omtaler' }}
                        <img src="{{ url('/storage/ic_16_dissatisfied.svg') }}"> {{ $product->review_dissatisfied_count }} {{ $product->review_dissatisfied_countt === 1 ? 'omtale' : 'omtaler' }}
                    </div>
                    <p class="italic font-xs text-grey-light">Kateogri: {{ $product->category->name }} </p>
                </div>
                </a>
            </div>
           @endforeach
        </div>
    </div>

@endsection