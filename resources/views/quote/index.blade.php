@extends('layouts.app')

@section('content')
<h1>The Simpsons&trade; Quote Finder</h1>
<div class="form-container">
  <form class="" action="/" method="get">
    <div>
      <label for="character">Character</label>
      <select name="character" id="character">
        @foreach ($characters as $character)
          <option value="{{$character}}">{{$character}}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label for="textFilter">Contains Text</label>
      <input type="text" name="textFilter" id="textFilter" value="{{$textFilter or ''}}" />
    </div>
    <div>
      <label for="showCount">Show Result Count?</label>
      <input type="checkbox" name="showCount" id="showCount" {{ ($showCount) ? 'checked' : ''}} />
    </div>
    <input type="submit" value="Submit" />
  </form>
</div>
@if($showCount)
  <div class="alert alert-info" role="alert">
    <strong>Result count:</strong> {{$resultCount}}
  </div>
@endif
<ul>
  @foreach ($quotes as $quote)
    <li class="quote-container {{strtolower($quote['character'])}}">
      <span class="quote-text">{{$quote["quote"]}}</span>
      <span class="quote-author">-{{$quote["character"]}}</span>
    </li>
  @endforeach
</ul>
@endsection
