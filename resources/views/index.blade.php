@extends ('template.shop');
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
  </table>
