<?php
use App\Http\Controllers\StaticController;
$getProdutos = StaticController::getProdutosVendidos();

?>
@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="submenu">{{$submenu}}</h4>

                </div>
                <br/>
                <div class="form">

                    <figure class="highcharts-figure">
                        <div id="container"></div>
                        <p class="highcharts-description" style="text-align: center;">
                            Gráfico ilustrando os produdos mais vendidos
                            e que têm mais saídas na farmácia.
                        </p>
                    </figure>

                    <script type="text/javascript">
                    Highcharts.chart('container', {
                        chart: {
                            type: 'variablepie'
                        },
                        title: {
                            text: 'Gráfico dos produtos mais vendidos'
                        },
                        tooltip: {
                            headerFormat: '',
                            pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
                                'Quantidades: <b>{point.y}</b><br/>' +
                                'Valores (Akz): <b>{point.z}</b><br/>'
                        },
                        series: [{
                            minPointSize: 10,
                            innerSize: '20%',
                            zMin: 0,
                            name: 'produts',
                            data: [
                            <?php
                                foreach($getProdutos as $produtos){
                                    $getItemVendaProduto = StaticController::getItemVendaProduto($produtos->id);
                                    $quantidade = 0;
                                    foreach($getItemVendaProduto as $item_venda){
                                    $quantidade = $quantidade + $item_venda->quantidade;
                                    }
                                ?>

                            {
                                name: "{{$produtos->nome}} - {{$produtos->descricao}}",
                                y: {{$quantidade}},
                                z: 92.9
                            },
                            <?php } ?>
                                ]
                        }]
                    });

                            </script>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
