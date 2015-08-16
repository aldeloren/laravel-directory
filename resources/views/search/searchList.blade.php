@extends('layout')  

@section('content')
  @if ( $results )
  @foreach ($data as $individual)
    @if ( isset($individual['uid']) )
      {{ $individual['cn'] }} <br/>
    @endif 
  @endforeach

  @else
    No Results Found.
  @endif
@stop
