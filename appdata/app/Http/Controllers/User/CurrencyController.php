<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    public function setCurrency($type)
    {
        request()->session()->put('currency', $type);
        return redirect()->back();
    }
}
