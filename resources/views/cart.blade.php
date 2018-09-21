@extends ('template.shop');
@section('content');
  <table class="table table-bordered">
                      <tr>
                          <th>Prodotti</th>
                          <th>Prezzo unitario</th>
                          <th width="280px">Quantità</th>
                      </tr>
                  @foreach ($cart as $product)
                  <tr>
                      <td>{{ $product->product}}</td>
                      <td>{{ $product->price}}</td>
                      <td>{{ $product->quant}}</td>
                      <td><a class="btn btn-primary" href="{{ route('cruddecrement', ['id'=>$product->id])}}">-</a></td>
                      <td><a class="btn btn-primary" href="{{ route('crudincrement',['id'=>$product->id])}}">+</a></td>
                      <td><a class="btn btn-danger" href="{{ route('cruddelete',['id'=>$product->id])}}">Elimina</a></td>
                  </tr>
                  @endforeach
  </table>
  <table class="table table-bordered">
    <tr>
        <td></td>
        <td>Totale da pagare = {{$sum}}0</td>
        <td><a class="btn btn-primary" href="{{ route('buy')}}">Concludi acquisto</a></td>
    </tr>
  </table>
