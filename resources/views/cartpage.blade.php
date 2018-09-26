@extends ('template.main')
@section('body')
  @include ('partials.topbar')
  @include ('partials.cart')
  {{-- <table class="table table-bordered">
                      <tr>
                          <th>Prodotti</th>
                          <th>Prezzo unitario</th>
                          <th width="280px">Quantità</th>
                      </tr>
                  @foreach ($cart as $product)
                  <tr>
                      <td>{{ $product->name}}</td>
                      <td>{{ $product->price}}</td>
                      <td>{{ $product->quantity}}</td>
                      <td><a class="btn btn-primary" href="{{ route('cruddecrement', ['id'=>$product->id])}}">-</a></td>
                      <td><a class="btn btn-primary" href="{{ route('crudincrement',['id'=>$product->id])}}">+</a></td>
                      <td><a class="btn btn-danger" href="{{ route('cruddelete',['id'=>$product->id])}}">Elimina</a></td>
                  </tr>
                  @endforeach
  </table>
  <table class="table table-bordered">
    <tr>
        <td></td>
        @if (strpos($sum, ".") !== false)
        <td>Totale da pagare = {{$sum}}0</td>
        @else
        <td>Totale da pagare = {{$sum}}.00</td>
        @endif
        <td><a class="btn btn-primary" href="checkout">Concludi acquisto</a></td>
    </tr>
  </table> --}}
@endsection
