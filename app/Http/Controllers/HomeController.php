<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

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
