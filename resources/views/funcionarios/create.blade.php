@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="submenu">{{$submenu}}</h4>
                    <h4 class="link"><a href="/funcionarios/" class="btn btn-warning btn-sm"><i class="fa fa-search"></i> Listar</a></h4>
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

                    {{Form::open(['url' =>"/funcionarios/", 'method'=>"post", 'file'=>"true"])}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('nome', "Nome do funcionario")}} <span class="text-danger">*</span>
                                {{Form::text('nome', null, ['class'=>"form-control", 'placeholder'=>"Nome do funcionario"])}}
                                @if($errors->has('nome'))
                                <span class="text-danger">{{$errors->first('nome')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('genero', "Gênero")}} <span class="text-danger">*</span>
                                {{Form::select('genero',  [
                                    'M'=>"M",
                                    'F'=>"F",
                                ], null, ['class'=>"form-control", 'placeholder'=>"Gênero"])}}
                                @if($errors->has('genero'))
                                <span class="text-danger">{{$errors->first('genero')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('data_nascimento', "Data de Nascimento")}} <span class="text-danger">*</span>
                                {{Form::date('data_nascimento', null, ['class'=>"form-control", 'placeholder'=>"Data de Nascimento"])}}
                                @if($errors->has('data_nascimento'))
                                <span class="text-danger">{{$errors->first('data_nascimento')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('foto', "Foto")}}
                                {{Form::file('foto', null, ['class'=>"form-control", 'placeholder'=>"Foto"])}}
                                @if($errors->has('foto'))
                                <span class="text-danger">{{$errors->first('foto')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('telefone', "Telefone")}} <span class="text-danger">*</span>
                                {{Form::number('telefone', null, ['class'=>"form-control", 'placeholder'=>"Telefone"])}}
                                @if($errors->has('telefone'))
                                <span class="text-danger">{{$errors->first('telefone')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('bairro', "Endereço")}}
                                {{Form::text('bairro', null, ['class'=>"form-control", 'placeholder'=>"Endereço"])}}
                                @if($errors->has('bairro'))
                                <span class="text-danger">{{$errors->first('bairro')}}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('email', "E-mail")}}
                                {{Form::email('email', null, ['class'=>"form-control", 'placeholder'=>"E-mail"])}}
                                @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('cargo', "Cargo")}} <span class="text-danger">*</span>
                                {{Form::select('cargo',  [
                                    'Recepção'=>"Recepção",
                                    'Atendimento'=>"Atendimento",
                                    'Contabilista'=>"Contabilista",
                                    'Gestor de Marketing'=>"Gestor de Marketing",
                                ], null, ['class'=>"form-control", 'placeholder'=>"Cargo"])}}
                                @if($errors->has('cargo'))
                                <span class="text-danger">{{$errors->first('cargo')}}</span>
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
