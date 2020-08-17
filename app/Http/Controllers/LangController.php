<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function setLocale(Request $request)
    {
        $locale = $request->lang;
        Session::put('locale', $locale);
        return back();
    }
}
