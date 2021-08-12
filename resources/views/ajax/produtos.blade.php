
@foreach ($getProdutos as $produtos)
<tr>
<td>{{$produtos->nome}}</td>
<td>{{$produtos->categria}}</td>
<td>{{$produtos->quantidade}}</td>
<td>{{number_format($produtos->valor_venda,2,',','.')}}</td>
<td>{{$produtos->data_caducidade}}</td>
<td>
<a href="/vendas/carrinho/add/{{$produtos->id}}" class="btn btn-primary btn-sm">Adicionar</a>
</td>
</tr>
@endforeach

