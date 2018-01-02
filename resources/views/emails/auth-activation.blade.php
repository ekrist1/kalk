@component('mail::message')
# Heisann, du må aktivere kontoen din

Takk for at du opprettet bruker på Heisann.no. <br><br>
Du må aktivere kontoen din for å få tilgang.

@component('mail::button', ['url' => route('auth.activate', [
    'token' => $user->activation_token,
    'email' => $user->email,
    'lastpage' => $lastVisited,
])])
Aktiver konto
@endcomponent

Hilsen,<br>
{{ config('app.name') }}
@endcomponent
