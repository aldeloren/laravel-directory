@extends('layout')

@section('content')

This is the detailed individual view.

<dl>
  <dt>Gatorlink</dt>
  <dd>{{ $uid }}</dd>
  @if( isset($givenname) && isset($sn) )
    <dt>Name</dt>
    <dd>{{ $givenname }} {{ $sn }}</dd>
  @endif 
  @if( isset($title) )
    <dt>Title</dt>
    <dd>{{ $title }}</dd>
  @endif
  @if( isset($mail) ) 
    <dt>Email</dt>
    <dd>{{ $mail }}</dd>
  @endif
  @if( isset($edupersonprimaryaffiliation) )
    <dt>Affiliation</dt>
    <dl>{{ $edupersonprimaryaffiliation }}</dl>
  @endif
</dl>
  

@stop

