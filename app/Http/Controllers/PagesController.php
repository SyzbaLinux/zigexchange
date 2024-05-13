<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\GoldPrice;
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

        $response =  Http::get('https://v6.exchangerate-api.com/v6/df560050267e7fa43d3f1f2d/latest/'.$baseCurrency);
        $exchangeRates = $response->json();


        return Inertia::render('DesignTwo',[
            'conversion_rates'       => $exchangeRates['conversion_rates'],
            'currencies'             => Currency::get(),
            'base_currency'          => $baseCurrency,
            'exchange_currency'      => $exchange_currency,
            'exchange_amount'        => $exchange_amount,
            'officialGoldPrices'     =>GoldPrice::where('is_official',true)->latest('date_fetched')->first(),
            'goldPrices'             =>GoldPrice::latest()->limit(5)->get(),
            'time_last_update_utc'   => date('D F Y H:i:s T',strtotime($exchangeRates['time_last_update_utc'])),
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


}
