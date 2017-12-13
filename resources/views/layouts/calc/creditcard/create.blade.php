@extends('layouts.app')

@section('content')

    <form action="" method="POST">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-grey font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Navn
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-grey-lighter appearance-none border-2 border-grey-lighter hover:border-purple rounded w-full py-2 px-4 text-grey-darker" name="name" id="name" type="text">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-grey font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-username">
                    Beskrivelse
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-grey-lighter appearance-none border-2 border-grey-lighter hover:border-purple rounded w-full py-2 px-4 text-grey-darker" name="description" id="description" type="text">
            </div>
        </div>

        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-purple hover:bg-purple-light text-white font-bold py-2 px-4 rounded" type="submit">
                    Lagre
                </button>
            </div>
        </div>
    </form>

@endsection

