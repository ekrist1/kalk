@extends('layouts.app')

@section('content')
    <div id="content" class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">

            @include('partials.errors')

            @if (session('status'))
                <flash status="{{ session('status') }}"></flash>
            @endif

            <form action="/admin/product" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <label class="block text-grey-darker text-sm font-bold mb-2" for="category">
                Kategori:
            </label>
            <div class="inline-block relative sm:w-full md:w-1/2 mb-4">
                <select name="category" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

            <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                Navn:
            </label>
            <input name="name" class="sm:w-full md:w-1/2 p-2 mb-4">

            <label class="block text-grey-darker text-sm font-bold mb-2" for="body">
                Beskrivelse:
            </label>
            <textarea name="body" class="h-24 sm:w-full md:w-1/2 p-2 mb-4"></textarea>

            <label class="block text-grey-darker text-sm font-bold mb-2" for="images">
                Beskrivelse:
            </label>
            <input type="file" name="images[]" multiple>

            <label class="block text-grey-darker text-sm font-bold mb-2" for="is_actve">
                Aktiv:
            </label>
            <input name="is_active" class="mr-2" value="is_active" type="checkbox" checked="true">

            <label class="block text-grey-darker text-sm font-bold mb-2" for="is_featured">
                Profilert:
            </label>
            <input name="is_featured" value="is_featured" class="mr-2" type="checkbox">

           <div class="mt-6">
             <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">Lagre </button><a href="{{ url('/products') }}">Avbryt</a>
           </div>

        </form>

    </div>

@endsection