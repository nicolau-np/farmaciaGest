@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="submenu">{{$submenu}}</h4>
                    <h4 class="link"><a href="/fabricantes/" class="btn btn-warning btn-sm"><i class="fa fa-search"></i> Listar</a></h4>
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

                    {{Form::open(['url' =>"/fabricantes/{$getFabricante->id}", 'method'=>"put", 'file'=>"true"])}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('nome', "Nome do fabricante")}} <span class="text-danger">*</span>
                                {{Form::text('nome', $getFabricante->nome, ['class'=>"form-control", 'placeholder'=>"Nome do fabricante"])}}
                                @if($errors->has('nome'))
                                <span class="text-danger">{{$errors->first('nome')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('endereco', "Endere??o")}}
                                {{Form::text('endereco', $getFabricante->endereco, ['class'=>"form-control", 'placeholder'=>"Endere??o"])}}
                                @if($errors->has('endereco'))
                                <span class="text-danger">{{$errors->first('endereco')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('telefone', "Telefone")}}
                                {{Form::number('telefone', $getFabricante->telefone, ['class'=>"form-control", 'placeholder'=>"Telefone"])}}
                                @if($errors->has('telefone'))
                                <span class="text-danger">{{$errors->first('telefone')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('email', "E-mail")}}
                                {{Form::email('email', $getFabricante->email, ['class'=>"form-control", 'placeholder'=>"E-mail"])}}
                                @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('estado', "Estado")}} <span class="text-danger">*</span>
                                {{Form::select('estado',  [
                                    'on'=>"on",
                                    'off'=>"off",
                                ], $getFabricante->estado, ['class'=>"form-control", 'placeholder'=>"Estado"])}}
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
