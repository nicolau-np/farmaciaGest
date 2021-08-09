@extends('layout.app')
@section('content')

<div class="row">
    @foreach ($getVendas as $vendas)
        <div class="col-lg-3 col-sm-6">

            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                    <img src="{{asset('assets/images/neutro/no-photo-icon-22.png')}}" class="rounded-circle" alt="" style="width:60px; height:60px;">
                        <h5 class="mt-3 mb-1">{{$vendas->cliente->pessoa->nome}}</h5>
                        <p class="m-0">{{date('d-m-Y', strtotime($vendas->created_at))}} &nbsp;&nbsp; {{date('H:i', strtotime($vendas->created_at))}}</p>
                         <a href="/vendas/select/{{$vendas->id}}" class="btn btn-sm btn-warning">Carregar Carrinho</a>
                    </div>
                </div>
            </div>

        </div>
    @endforeach

</div>

@endsection
