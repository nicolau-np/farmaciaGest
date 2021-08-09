@extends('layout.app')
@section('content')

<div class="row">

   <div class="col-md-12">
        <div class="card border-warning">
            <div class="card-body">
                {{Form::open(['method'=>"post", 'url'=>"", ])}}
                
                {{Form::close()}}
            </div>
            <div class="card-footer"><small>Last updateed 3 min ago</small>
            </div>
        </div>
    </div>

</div>

@endsection
