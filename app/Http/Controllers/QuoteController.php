<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function __invoke() {
      return view('quote.index')->with(['title' => 'All Quotes']);
    }

    public function filterBooks() {
      return view('quote.index')->with(['title' => 'Filtered Quotes']);
    }
}
