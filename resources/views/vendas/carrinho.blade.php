@extends('layout.app')
@section('content')

<div class="row">

   <div class="col-md-12">
        <div class="card border-warning">
            <div class="card-body">
                <div class="form">
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
            <div class="tabela">
                <table class="table table-striped table-bordered">
                   
                    <tbody class="load_tabela">

                    </tbody>
                </table>
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
