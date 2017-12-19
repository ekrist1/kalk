@extends('layouts.app')

@section('content')
<div class="flex items-center">
    <div class="md:w-1/2 md:mx-auto">
        <div class="rounded shadow">
            <div class="font-medium text-lg text-white bg-indigo p-3">
                Registrer ny bruker
            </div>
            <div class="bg-white p-3 rounded rounded-b">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="flex items-stretch mb-3">
                        <label for="name" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Navn</label>
                        <div class="flex flex-col w-3/4">
                            <input id="name" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('name') ? 'border-red-dark' : 'border-grey-light' }}" name="name" value="{{ old('name') }}" autofocus>
                            {!! $errors->first('name', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                        </div>
                    </div>

                    <div class="flex items-stretch mb-3">
                        <label for="email" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">E-post adresse</label>
                        <div class="flex flex-col w-3/4">
                            <input id="email" type="email" class="flex-grow h-8 px-2 border rounded {{ $errors->has('email') ? 'border-red-dark' : 'border-grey-light' }}" name="email" value="{{ old('email') }}" required>
                            {!! $errors->first('email', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                        </div>
                    </div>

                    <div class="flex items-stretch mb-4">
                        <label for="password" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Passord</label>
                        <div class="flex flex-col w-3/4">
                            <input id="password" type="password" class="flex-grow h-8 px-2 rounded border {{ $errors->has('password') ? 'border-red-dark' : 'border-grey-light' }}" name="password" required>
                            {!! $errors->first('password', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                        </div>
                    </div>

                    <div class="flex items-stretch mb-4">
                        <label for="password_confirmation" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Gjenta passord</label>
                        <div class="flex flex-col w-3/4">
                            <input id="password_confirmation" type="password" class="flex-grow h-8 px-2 rounded border {{ $errors->has('password_confirmation') ? 'border-red-dark' : 'border-grey-light' }}" name="password_confirmation" required>
                            {!! $errors->first('password_confirmation', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-3/4 ml-auto">
                            <button type="submit" class="bg-brand hover:bg-brand-dark text-white text-sm font-sembiold py-2 px-4 rounded mr-3">
                                Registrer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
