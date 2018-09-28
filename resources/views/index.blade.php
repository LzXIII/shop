@extends ('template.main')
@include ('partials.topbar')
@section ('body')
  @if(Auth::check())
    @if(Auth::User()->isAdmin())
      <a class="main-btn" href="insertproduct">Inserimento prodotti</a>
    @endif
  @endif
  @if(Session::has('empty'))
      <div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><em> {!! session('empty') !!}</em></div>
  @endif
  @if(Session::has('order'))
      <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('order') !!}</em></div>
  @endif
  @include ('partials.products')
@endsection

{{-- @extends ('template.shop');
@section('content');
  <table class="table table-bordered">
                      <tr>
                          <th>Prodotti</th>
                          <th>Prezzo</th>
                          <th width="280px">Azione</th>
                      </tr>
                  @foreach ($products as $product)
                  <tr>
                      <td>{{ $product->product}}</td>
                      <td>{{ $product->price}} €</td>
                      <td>
                        <form method="action" action="cart">
                          <button type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Compra</button>
                          <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Carrello</h4>
                                            </div>
                                            <div class="modal-body">
                                              <p>Prodotto aggiunto al carrello</p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                        <input type="hidden" name="price" value="{{$product->price}}"/>
                        <input type="hidden" name="product" value="{{$product->product}}"/>
                      </form>
                      </td>
                  </tr>
                  @endforeach
  </table> --}}
