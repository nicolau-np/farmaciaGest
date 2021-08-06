@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="submenu">{{$submenu}}</h4>
                    <h4 class="link"><a href="/produtos/" class="btn btn-warning btn-sm"><i class="fa fa-search"></i> Listar</a></h4>
                </div>
                <br/>
                <div class="form">
                    @if (session('error'))
                    <div class="alert bg-danger" style="color:white" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {{__(session('error'))}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                    @endif

                    @if (session('success'))
                    <div class="alert bg-success" style="color:white" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('success')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                    @endif

                    @if (session('info'))
                    <div class="alert bg-info" style="color:white" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('info')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                    @endif

                    {{Form::open(['url' =>"/produtos/", 'method'=>"post", 'enctype'=>"multipart/form-data"])}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('nome', "Nome do produto")}} <span class="text-danger">*</span>
                                {{Form::text('nome', null, ['class'=>"form-control", 'placeholder'=>"Nome do produto"])}}
                                @if($errors->has('nome'))
                                <span class="text-danger">{{$errors->first('nome')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('fabricante', "Fabricante")}} <span class="text-danger">*</span>
                                {{Form::select('fabricante',  $getFabricantes, null, ['class'=>"form-control", 'placeholder'=>"Fabricante"])}}
                                @if($errors->has('fabricante'))
                                <span class="text-danger">{{$errors->first('fabricante')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('fornecedor', "Fornecedor")}} <span class="text-danger">*</span>
                                {{Form::select('fornecedor',  $getFornecedores, null, ['class'=>"form-control", 'placeholder'=>"Fornecedor"])}}
                                @if($errors->has('fornecedor'))
                                <span class="text-danger">{{$errors->first('fornecedor')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('categoria', "Categoria")}} <span class="text-danger">*</span>
                                {{Form::select('categoria',  [
                                    'Analgésicos'=>"Analgésicos",
                                    'Xapores'=>"Xaropes",
                                    'Pomadas'=>"Pomadas",
                                ], null, ['class'=>"form-control", 'placeholder'=>"Categoria"])}}
                                @if($errors->has('categoria'))
                                <span class="text-danger">{{$errors->first('categoria')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {{Form::label('preco', "Preço")}} <span class="text-danger">*</span>
                                {{Form::number('preco', null, ['class'=>"form-control", 'placeholder'=>"Preço"])}}
                                @if($errors->has('preco'))
                                <span class="text-danger">{{$errors->first('preco')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {{Form::label('quantidade', "Quantidade")}} <span class="text-danger">*</span>
                                {{Form::number('quantidade', null, ['class'=>"form-control", 'placeholder'=>"Quantidade"])}}
                                @if($errors->has('quantidade'))
                                <span class="text-danger">{{$errors->first('quantidade')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('data_emissao', "Data criação")}} <span class="text-danger">*</span>
                                {{Form::date('data_emissao', null, ['class'=>"form-control", 'placeholder'=>"Data criação"])}}
                                @if($errors->has('data_emissao'))
                                <span class="text-danger">{{$errors->first('data_emissao')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('data_caducidade', "Data Caducidade")}} <span class="text-danger">*</span>
                                {{Form::date('data_caducidade', null, ['class'=>"form-control", 'placeholder'=>"Data Caducidade"])}}
                                @if($errors->has('data_caducidade'))
                                <span class="text-danger">{{$errors->first('data_caducidade')}}</span>
                                @endif
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('descricao', "Descrição")}} <span class="text-danger">*</span>
                                {{Form::text('descricao', null, ['class'=>"form-control", 'placeholder'=>"Descrição"])}}
                                @if($errors->has('descricao'))
                                <span class="text-danger">{{$errors->first('descricao')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('estado', "Estado")}} <span class="text-danger">*</span>
                                {{Form::select('estado',  [
                                    'on'=>"on",
                                    'off'=>"off",
                                ], null, ['class'=>"form-control", 'placeholder'=>"Estado"])}}
                                @if($errors->has('estado'))
                                <span class="text-danger">{{$errors->first('estado')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Salvar</button>
                            </div>
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
