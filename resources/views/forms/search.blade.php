{!! Form::open(array('route' => 'directory_search', 'class' => 'form')) !!}

  <div class="form-group">
      {!! Form::text('search', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'Search UF Directory')) !!}
  </div>
  
  <div class="form-group">
      {!! Form::submit('Search', 
        array('class'=>'btn btn-primary')) !!}
  </div>
  
  {!! Form::close() !!}
