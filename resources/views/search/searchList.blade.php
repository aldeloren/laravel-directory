@extends('layout')  

@section('content')

  This is the search list
  Your search for '{{ $term }}' returned: {{ $results }} results.
@stop
