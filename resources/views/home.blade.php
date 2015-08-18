@extends('layout')

@section('content')

<div class="col col-sm-12 jumbotron">
  <h2 class="text-center">Search the University of Florida Directory</h2>
</div>

<div id ="home-search" class="col col-sm-6">
@include('forms.search')
</div>
<div class="col col-sm-6">
    <h3 class="text-center">Search Tips</h3>
  <div id="search-tips"> 
    <p>Searches within the UF directory can be done in the following methods:</p>
    <ul>
      <li>Enter both a first name and last name: 'Antonio Calculon'</li>
      <li>Enter just a last name: 'Calclulon'</li>
      <li>Enter an email address: 'bender@ilovebender.com'</li>
      <li>Enter a GatorLink username: 'Calclulator'</li>
    </ul>
  </div>
</div>
@include('scripts.search')
@stop
