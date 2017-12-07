<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Creditcard;

class CreditcardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index() {

        $creditcards = Creditcard::all();

        $creditcards->transform(function ($creditcards) {
            $creditcards['showMore'] = false;
            return $creditcards;
        });

        return view ('layouts.calc.creditcard.show', compact('creditcards'));

    }
}
