@extends('layout.app')
@section('content')

<div class="row">

   <div class="col-md-12">

        <div class="card border-warning">
            <div class="card-body">
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

                {{Form::open(['method'=>"post", 'url'=>"", 'class'=>"form-search"])}}
                <div class="row">
                    <div class="col-md-5" style="text-align:center;">
                        <div class="form-inline">
                            {{Form::text('produto', null, ['class'=>"form-control search-produto", 'placeholder'=>"Pesquisar produto..."])}}
                            &nbsp;&nbsp;
                            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>

                    </div>

                    <div class="col-md-5" style="text-align:center;">
                        <div class="form-inline">
                            {{Form::text('codigo', null, ['class'=>"form-control", 'placeholder'=>"Codigo de Barra"])}}
                            &nbsp;&nbsp;
                            <button class="btn btn-danger"><i class="fa fa-sign-in"></i></button>
                        </div>

                    </div>
                </div>
                {{Form::close()}}
            </div>
            <hr/>
            <div class="card">
                <div class="card-body">

                    <p class="text-muted"><code></code>
                    </p>
                    <div id="accordion-two" class="accordion">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1"><i class="fa" aria-hidden="true"></i> Pesquisa</h5>
                            </div>
                            <div id="collapseOne1" class="collapse show" data-parent="#accordion-two">
                                <div class="card-body">
                                    <div class="tabela">
                                        <table class="table table-striped table-bordered">

                                            <tbody class="load_tabela">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2"><i class="fa" aria-hidden="true"></i> Carrinho</h5>
                            </div>
                            <div id="collapseTwo2" class="collapse show" data-parent="#accordion-two">
                                <div class="card-body">
                                    <div class="tabela">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Produto</th>
                                                    <th>Quant.</th>
                                                    <th>Preço Uni.</th>
                                                    <th>Total</th>
                                                    <th>Operações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                $i=0;
                                                foreach ($getItem_vendas as $item_venda){
                                                    $i++;
                                                    $total = ($item_venda->quantidade * $item_venda->preco_unitario);
                                                    ?>
                                                <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$item_venda->produto->nome}}</td>
                                                <td>
                                                <a href="/vendas/carrinho/decrement/{{$item_venda->id}}">-</a>
                                                    &nbsp;&nbsp;
                                                    {{$item_venda->quantidade}}
                                                    &nbsp;&nbsp;
                                                    <a href="/vendas/carrinho/increment/{{$item_venda->id}}">+</a>
                                                </td>
                                                <td>{{number_format($item_venda->preco_unitario,2,',','.')}}</td>
                                                <td>{{number_format($total,2,',','.')}}</td>
                                                <td>
                                                   <a href="/vendas/carrinho/delete/{{$item_venda->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3"><i class="fa" aria-hidden="true"></i> Impressão</h5>
                            </div>
                            <div id="collapseOne3" class="collapse show" data-parent="#accordion-two">
                                <div class="card-body">
                                    <div class="form">
                                        {{Form::open(['url'=>"", 'method'=>"post",])}}
                                        
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
            <div class="card-footer"><small>Last updateed 3 min ago</small>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function(){

        $('.search-produto').keyup(function(e){
            e.preventDefault();
            var data = $('.form-search').serialize();

        if($(this).val()===""){
            $(".load_tabela").html('Nenhum resultado da pesquisa');
        }else{
            $.ajax({
          type: "post",
          url: "{{route('search_produto')}}",
          data: data,
          dataType: 'html',
          success: function(response) {

            $(".load_tabela").html(response);
          }
        });

        }
        });
    });
</script>
@endsection
