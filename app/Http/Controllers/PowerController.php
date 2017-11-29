<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Power;
use App\Nordpool;


class PowerController extends Controller
{
    public function index() {

        $vendors = Power::all();
        $prices = Nordpool::all();

        return view('layouts.calc.power.show', compact(['vendors', 'prices']));
    }
}
