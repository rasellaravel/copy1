<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function contact()
    {
        return view('front-end.contact-us');
    }
    public function about()
    {
        return view('front-end.about');
    }
}
