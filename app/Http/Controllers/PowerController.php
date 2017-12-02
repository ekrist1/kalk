<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Power;
use App\Nordpool;
use GuzzleHttp\Client;


class PowerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index() {

        /*$client = new Client();
        $res = $client->request('GET', 'https://www.nordpoolgroup.com/api/map/data/daily/?currency=NOK');
        $obj = json_decode($res->getBody(), true);

        $test1 = array_get($obj, 'Prices.1.Value');
        foreach ($obj as $nordpoolStat) {
            foreach ($nordpoolStat as $elspot) {
               $value = array_get($elspot, 'Area');
               dd($value);
            }
        }

        dd($test1);*/

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
