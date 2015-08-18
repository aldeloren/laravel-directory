@extends('layout')

@section('content')

<div class="col col-sm-9">
  <div id="details" class="panel panel-primary">
    <div class="panel-heading">
      <div class="panel-title">
        @if ( isset($cn) )
          <div class="col col-sm-8">
            <h3 class="name text-left">
            {{ $cn }} 
            </h3>
          </div>
        @endif
        @if ( isset($edupersonprimaryaffiliation) ) 
          <div class="col col-sm-4">
            <h4 class="affiliation text-right">
            {{ $edupersonprimaryaffiliation }}
            </h4>
          </div>
        @endif
      </div><!-- ./panel-title -->
    </div><!-- ./panel-heading -->
    <div class="panel-body">
      <ul class="list-group">
      @if ( $title != '--UNKNOWN--' )
        <li class="list-group-item"><strong>Title:</strong> {{ $title }}</li>
      @endif
      @if ( $mail != '--UNKNOWN--' )
        <li class="list-group-item"><strong>Email:</strong> <a href="mailto:{{ $mail }}">{{ $mail }}</a></li> 
      @endif
      @if ( $telephonenumber != '--UNKNOWN--' )
        <li class="list-group-item"><strong>Telephone:</strong> <a href="tel:{{ $telephonenumber }}">{{ $telephonenumber }}</a></li> 
      @endif
      @if ( $ufleduofficelocation )
        <li class="list-group-item"><strong>Office Address:</strong> <br />{!! $ufleduofficelocation !!}</li>
      @endif 
      @if ( $postaladdress != '--UNKNOWN--' )
        <li class="list-group-item"><strong>Mailing Address:</strong> <br />{!! $postaladdress !!}</li>
      @endif
    </div><!-- ./panel-body -->
  </div><!-- ./panel -->
</div><!-- ./col-sm-8 -->
<script>
  $(document).ready(function(){
    var individual = '{{ $uid }}',
        indvName = '{{ $cn }}',
        localSearches = localStorage.recent_searches,
        recentResults = JSON.parse(localSearches),
        recentResultsJSON = recentResults.results, 
        resultNames = { 
          'name': indvName,
          'uid': individual
        },
        present = $.grep(recentResultsJSON, function(e){ return e.uid == individual; });

    if(present.length < 1){
      recentResultsJSON.unshift(resultNames);
      localStorage.recent_searches = JSON.stringify(recentResults);
    }
  });
</script>
@include('search.info')
@stop

