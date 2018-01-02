<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\Auth\UserRequestActivationEmail;

class ActivationController extends Controller
{
    public function activation(Request $request) {

        $user = User::where('email', $request->email)->where('activation_token', $request->token)->firstOrFail();

        $user->update([
            'active' => true,
            'activation_token' => null,
        ]);

        Auth::loginUsingId($user->id);

        Return redirect($request->lastpage)->withSuccess('Konto ble aktivert');

    }

    public function showResendForm() {

        return view('auth.passwords.resend');
    }

    public function resend(Request $request)
    {
        $this->validateResendRequest($request);

        $user = User::where('email', $request->email)->first();

        event(new UserRequestActivationEmail($user, '/'));

        return redirect()->route('login')
            ->withSuccess('Ny lenke for å aktivere kontoen din er sendt');
    }

    protected function validateResendRequest(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'Vi kunne ikke finne denne kontoen.'
        ]);
    }


}
