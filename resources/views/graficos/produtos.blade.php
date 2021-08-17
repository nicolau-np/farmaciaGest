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
                                'Area (square km): <b>{point.y}</b><br/>' +
                                'Population density (people per square km): <b>{point.z}</b><br/>'
                        },
                        series: [{
                            minPointSize: 10,
                            innerSize: '20%',
                            zMin: 0,
                            name: 'countries',
                            data: [{
                                name: 'Spain',
                                y: 505370,
                                z: 92.9
                            }, {
                                name: 'France',
                                y: 551500,
                                z: 118.7
                            }, {
                                name: 'Poland',
                                y: 312685,
                                z: 124.6
                            }, {
                                name: 'Czech Republic',
                                y: 78867,
                                z: 137.5
                            }, {
                                name: 'Italy',
                                y: 301340,
                                z: 201.8
                            }, {
                                name: 'Switzerland',
                                y: 41277,
                                z: 214.5
                            }, {
                                name: 'Germany',
                                y: 357022,
                                z: 235.6
                            }]
                        }]
                    });

                            </script>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
