<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * User story 0.4 — Statische informatiepagina
 */
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
