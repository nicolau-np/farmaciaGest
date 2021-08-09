@extends('layout.app')
@section('content')

<div class="row">

   <div class="col-md-12">
        <div class="card border-warning">
            <div class="card-body">
                {{Form::open(['method'=>"post", 'url'=>"", ])}}
                <div class="row">
                    <div class="col-md-12" style="text-align:center;">
                        {{Form::text('produto', null, ['class'=>"form-control", 'placeholder'=>"Nome do produto"])}}
                    </div>
                </div>
                {{Form::close()}}
            </div>
            <div class="card-footer"><small>Last updateed 3 min ago</small>
            </div>
        </div>
    </div>

</div>

@endsection
