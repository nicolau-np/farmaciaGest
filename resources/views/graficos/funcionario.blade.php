<?php

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
                <div class="tabela">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Funcionário</th>
                                <th>Nº de Vendas</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getFuncionarios as $funcionarios)
                            <tr>
                            <td>{{$funcionarios->pessoa->nome}}</td>
                            <td>{{$funcionarios->venda->count()}}</td>
                                <td>
                                    <?php
                                    $total_geral = 0;
                                        foreach($funcionarios->venda as $vendas){
                                            $total_geral = $total_geral + $vendas->valor_total;
                                        }
                                        ?>
                                        {{number_format($total_geral,2,',','.')}}
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
