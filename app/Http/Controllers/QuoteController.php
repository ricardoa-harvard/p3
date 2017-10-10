<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function __invoke() {
      return 'Showing all books';
    }

    public function filterBooks() {
      return 'showing a filtered list of books';
    }
}
