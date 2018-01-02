<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserRequestActivationEmail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        //disable guest register
        //$this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'active' => false,
            'activation_token' => str_random(255),
        ]);
        $user->assignRole('public');
        return $user;
    }
    public function redirectTo()
    {
        return Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo;
    }

    /**
     * @param Request $request
     * @param $user
     */
    protected function registered(Request $request, $user)
    {
        $lastVisited = Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo;
        event(new UserRequestActivationEmail($user, $lastVisited));

        $this->guard()->logout();

        return redirect(Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo)
            ->withSuccess('Du må bekrefte e-posten din før du kan logge inn. Sjekk e-posten din og klikk
            på aktiveringslenken.');

    }
}
