<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Welkomstscherm — de toegangspoort tot de applicatie.
 */
class WelcomeController extends Controller
{
    /**
     * Toont het welkomstscherm, of stuurt een ingelogde gebruiker door.
     */
    public function __invoke(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('welcome');
    }
}
