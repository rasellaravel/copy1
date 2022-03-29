<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class OmnivaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function omniva()
    {
        $data['m_m_n'] = 'omniva';
        return view('back-end.omniva.omniva-list', $data);
    }
}
