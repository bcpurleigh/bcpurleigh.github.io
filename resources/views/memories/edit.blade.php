@extends('layouts.app')
@section('title')
Edit Memory
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Currently editing a memory!</h3>
            <hr>
<form method="post" action='/memories/{{$memory->id}}'>
  <input name="_method" type="hidden" value="PATCH">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="memory_id" value="{{ $memory->id }}{{ old('memory_id') }}">
  <div class="form-group">
    <textarea name='body' class="editable form-control medium" rows="10">
      @if(!old('body'))
      {!! $memory->body !!}
      @endif
      {!! old('body') !!}
    </textarea>
    <script>
          var autolist = new AutoList();
          var editor = new MediumEditor('.editable', {
              buttonLabels: 'FontAwesome',
              extensions: {
                  'autolist': autolist
              }
          })
      </script>
  </div>
  @if($memory->active == '1')
  <input type="submit" name='publish' class="btn btn-success" value = "Update"/>
  @else
  <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
  @endif

</form>

<hr>

<h4>Delete Memory?</h4>

<form name="delete" method="post" action="/memories/{{$memory->id}}">
    <input name="_method" type="hidden" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
</form>

</div>
</div>
</div>
@endsection
