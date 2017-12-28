@extends('layouts.app')

@section('meta')
    <title>Skriv ny produktomtale: {{ $product->name }}</title>
    <meta name="description" content="Positive eller negative erfaringer av {{ $product->name }}? Legg til en ny produktomtale.">
    <meta property="og:url"                content="https://heisann.no/review/{{ $product->slug }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Skriv ny produktomtale: {{ $product->name }}" />
    <meta property="og:description"        content="Positive eller negative erfaringer av {{ $product->name }}? Legg til en ny produktomtale." />
    <meta property="og:image"              content="{{ asset('storage/product.jpg') }}" />
@endsection

@section('content')

    @hasrole('public')

    <div id="content" class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
    <p class="text-xl text-center font-bold text-grey-dark mb-2">{{ $product->name }}</p>
    <p class="text-center">---</p>
    <p class="text-xl text-center font-bold text-grey-dark mb-6">Legg til ny produktvurdering</p>
    <form action="/review/{{ $product->slug }}" method="POST">
        {{ csrf_field() }}
        <label class="block text-grey-darker text-sm font-bold mb-2" for="score">
            Velg hvor fornøyd du er med produktet:
        </label>
            <div class="inline-block relative sm:w-full md:w-1/2 mb-4">
                <select name="score" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow">
                    <option value="5">
                        Fornøyd :)
                    </option>
                    <option value="3">
                        Passe fornøyd |-)
                    </option>
                    <option value="1">Ikke fornøyd :(</option>
                </select>
                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

            <div>
                <label class="block text-grey-darker text-sm font-bold mb-2" for="body">
                    Din vurdering (obligatorisk)
                </label>
                <textarea name="body" class="h-24 sm:w-full md:w-1/2 p-2 mb-4" placeholder="Skriv inn dine erfaringer med produktet" required></textarea>
            </div>

        <button type="submit" class="bg-indigo hover:bg-indigo-dark text-white font-bold py-2 px-4 rounded mr-3">Lagre</button> <a href="{{ url('/product', [$product->slug]) }}">Avbryt</a>
    </form>

        <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md mt-6 sm:w-full md:w-1/2" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">Om produktvurderinger på heisann.no</p>
                    <p class="text-sm">Vi tar personvern på alvor. Vi publiserer verken ditt navn eller din e-postadresse. Kun de 3 første bokstavene i navnet ditt vil vises.
                    Det kan ta inntil 24 timer før produktomtalen blir publisert.
                    </p>
                </div>
            </div>
        </div>

    </div>

    @else
        <div id="content" class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">

        <p class="text-xl text-center font-bold text-grey-dark mb-2">{{ $product->name }}</p>

        <p class="text-xl text-center font-bold text-grey-dark mb-6">Du må opprette bruker for å skrive en produktomtale</p>

       <div class="text-center mb-4">
            <a class="no-underline hover:underline text-indigo pr-3 font-bold" href="{{ url('/login') }}">Logg inn</a>
            <a class="no-underline hover:underline text-indigo font-bold" href="{{ url('/register') }}">Ny bruker</a>
       </div>
        <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold mb-2">Opprett bruker og skriv din første produktomtale</p>
                    <p class="text-sm">Du må lage deg bruker for å kunne skrive produktomtaler.
                        Vi publiserer aldri ditt fulle navn eller din e-postadresse. Kun de 3 første bokstavene i navnet ditt vil vises.
                        Det kan ta inntil 24 timer før produktomtalen blir publisert.</p>
                </div>
            </div>
        </div>
        </div>
    @endhasrole


@endsection