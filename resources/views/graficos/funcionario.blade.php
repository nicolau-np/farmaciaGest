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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
