@extends('layouts.app')
@section('title')
Add New Post
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Add a new memory</h3>
            <p><strong>Tip:</strong> Highlight and select a word of phrase and view the pop-up editor to add simple styling to your memory!</p>
            <p>Remember: Your memories are kept private, so write whatever you want to remember.</p><hr>
<form action="/memories" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">

      <textarea name="body" class="editable form-control medium" rows="10">{{ old('body') }}</textarea>

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
  <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
</form>
</div>
</div>
</div>
@endsection
