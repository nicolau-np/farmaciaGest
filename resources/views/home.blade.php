@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">Produtos</h3>
                <div class="d-inline-block">
                <h2 class="text-white">{{$getProdutos->count()}}</h2>
                    <p class="text-white mb-0">{{date('d-m-Y')}}</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">Funcionários</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$getFuncionarios->count()}}</h2>
                    <p class="text-white mb-0">{{date('d-m-Y')}}</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">Clientes</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$getClientes->count()}}</h2>
                    <p class="text-white mb-0">{{date('d-m-Y')}}</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-4">
            <div class="card-body">
                <h3 class="card-title text-white">Clientes Satisfeitos</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">99%</h2>
                    <p class="text-white mb-0">{{date('d-m-Y')}}</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Seja Bem vindo <a href="#">{{Auth::user()->pessoa->nome}}</a></h4>
                <div class="bootstrap-carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('assets/images/big/img5.jpg')}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('assets/images/big/img6.jpg')}}" alt="Second slide">
                            </div>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('assets/images/big/img5.jpg')}}" alt="Third slide">
                            </div>
                        </div><a class="carousel-control-prev" href="#carouselExampleIndicators" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a><a class="carousel-control-next" href="#carouselExampleIndicators" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
