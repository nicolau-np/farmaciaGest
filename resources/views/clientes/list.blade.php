@extends('layout.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="submenu">{{$submenu}}</h4>
                    <h4 class="link"></h4>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getClientes as $clientes)
                            <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$clientes->pessoa->nome}}
                            <td>{{$clientes->pessoa->telefone}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        {{$getClientes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
