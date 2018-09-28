<div class="col-md-12">
  <div class="order-summary clearfix">
    <div class="section-title">
      <h3 class="title">Carrello</h3>
    </div>
    <table class="shopping-cart-table table">
      <thead>
        <tr>
          <th>Prodotti</th>
          <th></th>
          <th class="text-center">Prezzo</th>
          <th class="text-center"></th>
          <th class="text-center">Quantità</th>
          <th class="text-center"></th>
          <th class="text-center">Totale</th>
          <th class="text-right">Elimina</th>
        </tr>
      </thead>
      <tbody>
      @if (Auth::check())
        @foreach ($cart as $product)
          <tr>
            <td class="thumb"><img src="./img/{{$product->image}}" alt=""></td>
            <td class="details">
              {{ $product->name}}
              <ul>
                <li><span></span></li>
                <li><span></span></li>
              </ul>
            </td>
            <td class="price text-center"><strong>{{$product->price}}</strong></td>
            <td class="qty text-center"><a class="main-btn" href="{{ route('cruddecrement', ['id'=>$product->id])}}">-</a></td>
            <td class="qty text-center">{{ $product->quantity}}</td>
            <td class="qty text-center"><a class="main-btn" href="{{ route('crudincrement',['id'=>$product->id])}}">+</a></td>
            <td class="total text-center"><strong class="primary-color">{{$product->price}}</strong></td>
            <td class="text-right"><a class="main-btn icon-btn" href="{{ route('cruddelete',['id'=>$product->id])}}"><i class="fa fa-close"></i></button></td>
          </tr>
        @endforeach
      @endif
      </tbody>
      {{-- <tfoot>
        <tr>
          <th class="empty" colspan="3"></th>
          <th>SUBTOTALE</th>
          @if (strpos($sum, ".") !== false)
            <th colspan="2" class="sub-total">€ {{$sum}}0</th>
          @else
            <th colspan="2" class="sub-total">€ {{$sum}}.00</th>
          @endif
        </tr>
        <tr>
          <th class="empty" colspan="3"></th>
          <th>SPEDIZIONE</th>
          @if($sum=="")
            <td colspan="2" class="sub-total"><strong>€ 0.00</strong></td>
          @else
          <td colspan="2" class="sub-total"><strong>€ {{$shipping}}</strong></td>
        @endif
        </tr>
        <tr>
          <th class="empty" colspan="3"></th>
          <th>TOTALE</th>
          @if($sum=="")
            <td colspan="2" class="sub-total"><strong>€ 0.00</strong></td>
          @else
          @if (strpos($sum, ".") !== false)
            <th colspan="2" class="sub-total">€ {{$sum+$shipping}}0</th>
          @else
            <th colspan="2" class="sub-total">€ {{$sum+$shipping}}.00</th>
          @endif
        @endif
        </tr>
      </tfoot> --}}
    </table>
  </div>

</div>
