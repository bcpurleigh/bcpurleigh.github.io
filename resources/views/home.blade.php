@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $title }}</div>

                <div class="panel-body">
                    @foreach($memories as $memory)

                        <div class="list-group">
                            <div class="list-group-item">
                               <article>
                                   {!! $memory->body !!}
                               </article>
                           </div>
                            <div class="list-group-item">
                                 <p class="nomargin"><a href="{{{ url('memories/'.$memory->id.'/edit') }}}">{{ $memory->created_at->format('M d,Y') }}</a></p>
                             </div>

                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="text-center">
                <a href="{{ url('memories/create') }}">
                    <button value="Add new memory" class="btn btn-primary">Add a new memory!</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
