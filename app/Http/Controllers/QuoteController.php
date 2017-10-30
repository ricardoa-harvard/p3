<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function filterQuotes(Request $request) {
      $quotesRawData = file_get_contents(database_path('/quotes.json'));
      $quotes = json_decode($quotesRawData, true)['quotes'];
      $characters = $this->extractCharacters($quotes);

      //get request data
      $textFilter = $request->input('textFilter');
      $characterFilter = $request->input('character');
      $showCount = $request->has('showCount');

      //If a text filter is specified remove quotes that do not contain filter string
      if ($textFilter != '') {
        foreach($quotes as $index => $quote) {
          if(strpos($quote['quote'], $textFilter) === false) {
            unset($quotes[$index]);
          }
        }
      }

      //If a character filter is specified remove quotes for other characters
      if ($characterFilter && $characterFilter != 'All') {
        foreach ($quotes as $index => $quote) {
          if($quote["character"] != $characterFilter) {
            unset($quotes[$index]);
          }
        }
      }

      return view('quote.index')->with([
        'showCount' => $showCount,
        'quotes' => $quotes,
        'characters' => $characters,
        'resultCount' => count($quotes),
        'textFilter' => $textFilter
      ]);
    }

    private function extractCharacters($quotes) {
      $characters = array();
      $characters[] = 'All';

      foreach ($quotes as $quote) {
        if (!in_array($quote['character'], $characters)) {
          $characters[] = $quote['character'];
        }
      }

      return $characters;
    }
}
