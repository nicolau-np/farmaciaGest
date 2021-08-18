<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <style>
        @page{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        .cabecalho{

 font-size:14px;
}

.texto{
   display: block;
   float: right;
   border: 1px solid #333;
   padding: 8px;
}

.sr{
    border: 1px solid #333;
    padding:4px;
    width: 65%;
    font-size:14px;
}

.comp{
    background-color: #f5f5f5;
    border: 1px solid #333;
    width:100%;
    text-align: center;
    font-weight: bold;
    padding: 8px;
}

.table{
    width:100%;
    border: 1px solid #333;

}

.obs{
    background-color: #f5f5f5;
    border: 1px solid #333;
    width:100%;
    padding: 4px;
    text-align: center;
}

.data{
    padding: 4px;
    border: 1px solid #333;
    width: 28.3%;
}
.dados_cliente{
    color:rgb(0, 17, 255);
    font-weight: bold;
}
.total_geral{
    color:rgb(0, 17, 255);
    font-weight: bold;
    font-size: 15px;

    display: block;
    float: right;
    padding: 4px;
    border: 1px solid #333;
}
    </style>
</head>
<body>

    <div class="cabecalho">
        <span class="logo">
        <img src="https://img2.gratispng.com/20180331/yzq/kisspng-pharmacy-logo-pharmacist-pharmaceutical-drug-pharmacy-5abf3058c52fd8.1225652515224791928077.jpg" alt="">
        </span>
        <span class="texto">
        ABD FARMÁCIA<br/>
        CATUMBELA-BENGUELA<br/>
        NIF: 3100708910<br/>
        CONTACTOS: +244 945001891 ; +222 189120<br/>
        EMAIL: abdfarmacia@gmail.com
        </span>

    </div>
    <br/><br/>
<div class="corpo">
    <div class="comp">
       Factura Nº 00{{$getVenda->id}}
    </div>
</div>
<div class="proprietario">
    <div class="comp">
    Nome do Cliente: <span class="dados_cliente">{{$getVenda->cliente->pessoa->nome}}</span><br/>
    Telefone: <span class="dados_cliente">{{$getVenda->cliente->pessoa->telefone}}</span>
    </div>
</div>
    <br/><br/><br/>
        <div class="tabela">
           <table class="table" border=1 cellspacing=0 cellpadding=2 bordercolor="#000">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
                <th>Descrição</th>
                <th>P. Unitário</th>
                <th>Quant.</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $total = 0;
            $total_geral = 0;
                foreach ($getVenda->item_venda as $item_venda){
                    $i++;
                    $total = ($item_venda->quantidade * $item_venda->preco_unitario);
                    $total_geral = $total_geral + $total;
            ?>
             <tr>
             <td>{{$i}}</td>
             <td>{{$item_venda->produto->nome}}</td>
             <td>{{$item_venda->produto->descricao}}</td>
             <td>{{number_format($item_venda->preco_unitario,2,',','.')}} Akz</td>
             <td>{{$item_venda->quantidade}}</td>
             <td>{{number_format($total,2,',','.')}} Akz</td>
            </tr>
        <?php }
         ?>
        </tbody>
    </table>
    </div>

    <div class="total_geral">
        Total Pago: {{number_format($total_geral, 2, ',','.')}} Akz

    </div>
<div class="data">Data: {{ date('d-m-Y', strtotime($getVenda->created_at))}} {{ date('H:i:s', strtotime($getVenda->created_at))}}</div>
<br/>
<br/>
<div class="obs">
    **Muito obrigado volte sempre**
</div>
</body>
</html>
