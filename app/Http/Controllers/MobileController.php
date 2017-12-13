<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobile;

class MobileController extends Controller
{
    public function index() {

        $mobilesubscriptions = Mobile::all();

        $dataAmount = $mobilesubscriptions->unique('data')->sortBy('data')->pluck('data');


        $mobilesubscriptions->transform(function ($mobilesubscriptions) {
            $mobilesubscriptions['showMore'] = false;
            return $mobilesubscriptions;
        });

        return view('layouts.calc.mobile.show', compact('mobilesubscriptions', 'dataAmount'));
    }
}
