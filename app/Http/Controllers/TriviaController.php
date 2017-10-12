<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TriviaController extends Controller
{
    public function index()
    {
      return 'Show form to collect info from user...';
    }

    public function checkAnswer()
    {
      return 'At this step we should check the answer...';
      # redirect ...
    }
}
