<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Session::put('backUrl', URL::previous());
        $this->middleware('guest')->except('logout');
    }
    public function redirectTo()
    {
        return Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo;
    }

    /**
     * Custom validation to check if a user is activated
     *
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => [
                'required', 'string',
                Rule::exists('users')->where(function ($query) {
                    $query->where('active', true);
                })
            ],

            'password' => 'required|string',
        ], $this->validationErrors());
    }

    protected function validationErrors() {
        return [
            $this->username() . '.exists' => 'Ingen konto funnet, eller konto ikke aktivert ennå'
        ];
    }

    }
