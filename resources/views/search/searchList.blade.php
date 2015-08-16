@extends('layout')  

@section('content')

  @if ( $search_term && $fuzzy_search )
    <p>Your search yielded no results. Searching instead for '{{ $search_term }}' garnered 
    @if ( count($data) >= 100 )
      {{ count($data) }} results, and was limited by the directory application. Please try to refine your search to find the appropriate party.</p>
    @elseif ( count($data) < 100 )
      {{ count($data) }} results.</p>
    @endif
  @elseif ( $search_term && !$fuzzy_search )
    @if ( count($data) >= 100)
      <p>Your search for '{{ $search_term }}' yielded {{ count($data) }} results and was limited by the directory application. Please try to refine your search to find the appropriate party.</p>
    @else
      <p>Your search for '{{ $search_term }}' yielded {{ count($data) }} results.</p>
    @endif
  @endif

  @if ( $results )
    @foreach ($data as $individual)
      @if ( isset($individual['uid']) )
        {{ $individual['cn'] }} <br/>
        {{ $individual['uid'] }} <br />
      @endif 
    @endforeach
  @endif

@stop
