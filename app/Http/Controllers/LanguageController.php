<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function Khmer()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'khmer');
        return redirect()->back();
    }
    public function English()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }
}
