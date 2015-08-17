@extends('layout')

@section('content')

<div class="col col-sm-6">

{!! Form::open(array('route' => 'directory_search', 'class' => 'form')) !!}

  <div class="form-group">
      {!! Form::label('Search the UF Directory') !!}
      {!! Form::text('search', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'Please enter a name (First, Last, or both), email address, or GatorLink')) !!}
  </div>
  
  <div class="form-group">
      {!! Form::submit('Search', 
        array('class'=>'btn btn-primary')) !!}
  </div>
  
  {!! Form::close() !!}

</div>
<div class="col col-sm-6">





These are the tips
</div>

@stop
