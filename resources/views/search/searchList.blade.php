@extends('layout')  

@section('content')

  @if ( $search_term && $fuzzy_search )
    <p class="search-info alert alert-warning">Your search yielded no results. Searching instead for '{{ $search_term }}' garnered 
    @if ( count($data) >= 100 )
      {{ count($data) }} results, and was limited by the directory application. Please try to refine your search to find the appropriate party.</p>
    @elseif ( count($data) < 100 )
      {{ count($data) }} results.</p>
    @endif
  @elseif ( $search_term && !$fuzzy_search )
    @if ( count($data) >= 100)
      <p class="search-info alert-warning">Your search for '{{ $search_term }}' yielded {{ count($data) }} results and was limited by the directory application. Please try to refine your search to find the appropriate party.</p>
    @else
      <p class="search-info alert-success">Your search for '{{ $search_term }}' yielded {{ count($data) }} results.</p>
    @endif
  @endif

  @if ( $results )
    <div class="row">
      <div class="search-entries col col-sm-9">
      @foreach ($data as $individual)
        @if ( isset($individual['uid']) )
          <div class="search-entry row">
            @if ( isset($individual['cn']) )
            <div class="entry-name col col-sm-6">
              <h4><a href="{{ route('detail', $individual['uid']) }}">{{ $individual['cn'] }}</a></h4>
            </div><!-- ./entry-name -->
            <div class="entry-details col col-sm-6 text-right">
              <ul class="list-unstyled">
                @if ( isset($individual['mail'] ) )
                <li class="entry-email"><a href="mailto:{{ $individual['mail'] }}"><span class="glyphicon glyphicon-envelope"></span> {{ $individual['mail'] }}</a></li> 
                @endif
                @if ( isset($individual['telephonenumber']) )
                <li class="entry-telephone"><a href="tel:{{ $individual['telephonenumber'] }}"><span class="glyphicon glyphicon-earphone"></span> {{ $individual['telephonenumber'] }}</a></li> 
                @endif
            </div><!-- ./entry-details -->
            @endif
          </div><!-- ./search-entry -->
        @endif 
      @endforeach
      </div><!-- ./search-entries -->
      @include('search.info')
    </div><!-- ./row -->
  @endif

@stop
