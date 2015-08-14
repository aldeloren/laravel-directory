@extends('layout')  

@section('content')

  @if ( $results )
 
    @foreach ( $data as $individual )
      @if ( isset($individual['uid']) )
        {{ $individual['sn'] }}
      @endif
    @endforeach

  @endif
@stop
