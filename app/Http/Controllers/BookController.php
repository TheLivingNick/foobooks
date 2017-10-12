<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

class BookController extends Controller
{
    //

    public function index()
    {
      return 'Show all the books...';
    }

    public function show($title)
    {
      return "You are viewing $title";
    }

    public function example()
    {
      return Hash::make('topsecret');
    }
}
