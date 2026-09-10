<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Toont de informatiepagina over het fictieve land Veldonia.
     */
    public function about(): View
    {
        return view('about');
    }
}
