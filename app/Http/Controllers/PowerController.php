<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Power;
use App\Nordpool;


class PowerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index() {

        $vendors = Power::all();
        $prices = Nordpool::all();
        $elspotAveragePrice = Redis::get('elspotAveragePrice');
        return view('layouts.calc.power.show', compact(['vendors', 'prices', 'elspotAveragePrice']));
    }

    public function create() {

        return view('layouts.admin.power.create');

    }

    public function store(Request $request) {

        $elspotAveragePrice = $request->validate([
            'averagePrice' => 'required|numeric'
        ]);

    }
}
