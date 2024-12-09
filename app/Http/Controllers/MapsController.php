<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MapsController extends Controller
{
    /**
     * Display the maps page
     *
     * @return View
     */
    public function index(): View
    {
        return view('maps');
    }
}