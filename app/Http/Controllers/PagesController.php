<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Squire\Models\Country;

class PagesController extends Controller
{
    public function welcome(Request $request)
    {
        $baseCurrency      = $request->base_currency ? $request->base_currency : 'ZWL';
        $exchange_currency = $request->exchange_currency ? $request->exchange_currency : 'USD';
        $exchange_amount   = $request->exchange_amount ? $request->exchange_amount : '1';

        $response = Http::get('https://v6.exchangerate-api.com/v6/df560050267e7fa43d3f1f2d/latest/'.$baseCurrency);
        $exchangeRates = $response->json();

        return Inertia::render('Welcome',[
            'conversion_rates'  => $exchangeRates['conversion_rates'],
            'currencies'        => Currency::get(),
            'base_currency'     => $baseCurrency,
            'exchange_currency' => $exchange_currency,
            'exchange_amount'   => $exchange_amount,
        ]);
    }

    public function contact()
    {
        return Inertia::render('Welcome');
    }

    public function faq()
    {
        return Inertia::render('Welcome');
    }

    public function about()
    {
        return Inertia::render('Welcome');
    }

    public function designTwo()
    {

       // return Country::with('currency')->get();

        return Inertia::render('DesignTwo',[
            'currencies'        => Country::get(),
        ]);
    }
}
