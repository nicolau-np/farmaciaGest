@extends('layout.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="submenu">{{$submenu}}</h4>
                    <h4 class="link"><a href="/fabricantes/create/" class="btn btn-success btn-sm"><i class="fa fa-add"></i> Novo</a></h4>
                </div>

                <div class="table-responsive">
                    @if (session('error'))
                    <div class="alert bg-danger" style="color:white" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {{__(session('error'))}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                    @endif

                    @if (session('success'))
                    <div class="alert bg-success" style="color:white" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('success')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                    @endif

                    @if (session('info'))
                    <div class="alert bg-info" style="color:white" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('info')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                    @endif

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Estado</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getFabricantes as $fabricantes)
                            <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$fabricantes->nome}}</td>
                            <td>{{$fabricantes->telefone}}</td>
                            <td>{{$fabricantes->email}}</td>
                            <td>{{$fabricantes->endereco}}</td>
                            <td>
                                @if($fabricantes->estado == "on")
                                <span class="badge badge-success px-2">{{$fabricantes->estado}}</span>
                                @else
                                <span class="badge badge-danger px-2">{{$fabricantes->estado}}</span>
                                @endif
                            </td>
                            <td>
                                {{Form::open(['url'=>"/fabricantes/{$fabricantes->id}", 'method'=>"delete"])}}
                                <a href="/fabricantes/{{$fabricantes->id}}/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                                &nbsp;
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
                                {{Form::close()}}
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        {{$getFabricantes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
