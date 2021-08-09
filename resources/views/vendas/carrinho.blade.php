@extends('layout.app')
@section('content')

<div class="row">

   <div class="col-md-12">
        <div class="card border-warning">
            <div class="card-body">
                <div class="form">
                {{Form::open(['method'=>"post", 'url'=>"", ])}}
                <div class="row">
                    <div class="col-md-5" style="text-align:center;">
                        <div class="form-inline">
                            {{Form::text('produto', null, ['class'=>"form-control", 'placeholder'=>"Pesquisar produto..."])}}
                            &nbsp;&nbsp;
                            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>

                    </div>

                    <div class="col-md-5" style="text-align:center;">
                        <div class="form-inline">
                            {{Form::text('codigo', null, ['class'=>"form-control", 'placeholder'=>"Codigo de Barra"])}}
                            &nbsp;&nbsp;
                            <button class="btn btn-danger"><i class="fa fa-sign-in"></i></button>
                        </div>

                    </div>
                </div>
                {{Form::close()}}
            </div>

            <div class="load_tabela">
                
            </div>

            </div>
            <div class="card-footer"><small>Last updateed 3 min ago</small>
            </div>
        </div>
    </div>

</div>

@endsection
