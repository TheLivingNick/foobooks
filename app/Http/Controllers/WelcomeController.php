<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
    * Display the main homepage for the site
    * GET /
    */
    public function __invoke()
    {
        return view('welcome');
    }
}
