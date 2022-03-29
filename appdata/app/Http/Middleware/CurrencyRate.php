<?php

namespace App\Http\Middleware;

use App\CurrencyRate as CurrencyModel;
use Closure;
use Illuminate\Support\Facades\Config;

class CurrencyRate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd("test");
        $check = CurrencyModel::where('name', 'USD')->first();
        if ($check) {
            // dd($check->updated_at->diffInMinutes());
            if ($check->updated_at->diffInMinutes() >= 30) {
                CurrencyModel::truncate();
                //self::createCurrency();
            }
        } else {
            //self::createCurrency();
        }
        if (request()->segment(1) != 'admin') {
            if (!session()->has('currency')) {
                session()->put('currency', 'EUR');
            }
            Config::set('app.currency', session()->has('currency') ? session()->get('currency') : 'EUR');
        }
        return $next($request);
    }
    public static function createCurrency()
    {
        $rateUsd = file_get_contents('https://free.currconv.com/api/v7/convert?q=EUR_USD&compact=ultra&apiKey=60eda6fd2e5c4fc49d6f');
        $rateUsd = json_decode($rateUsd, true);
        $rateRub = file_get_contents('https://free.currconv.com/api/v7/convert?q=EUR_RUB&compact=ultra&apiKey=60eda6fd2e5c4fc49d6f');
        $rateRub = json_decode($rateRub, true);
        dd($rateUsd);
        CurrencyModel::create([
            'name' => 'USD',
            'rate' => $rateUsd['EUR_USD'],
        ]);
        CurrencyModel::create([
            'name' => 'RUB',
            'rate' => $rateRub['EUR_RUB'],
        ]);

    }
}
