<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * User story 0.2 — Homepage
 */
class HomeController extends Controller
{
    /**
     * Toont de homepage van Spoorwegen Veldonia.
     */
    public function index(): View
    {
        return view('home');
    }
}
