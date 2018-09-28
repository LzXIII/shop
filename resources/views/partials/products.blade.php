<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- section title -->
      <div class="col-md-12">
        <div class="section-title">
          <h2 class="title">Prodotti</h2>
        </div>
      </div>
      <!-- section title -->
@foreach ($product as $p)
      <!-- Product Single -->
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="product product-single">
          <div class="product-thumb">
            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i>Dettagli</button>
            <img src="./img/{{$p->image}}" alt="Image">
          </div>
          <div class="product-body">
            <h3 class="product-price">{{$p->price}}</h3>
            <h2 class="product-name"><a href="#">{{$p->name}}</a></h2>
            <div class="product-btns">
              <form method="get" action="cart">
                <button class="primary-btn add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i>Aggiungi al Carrello</button>
                <input type="hidden" name="price" value="{{$p->price}}"/>
                <input type="hidden" name="name" value="{{$p->name}}"/>
                @if (Auth::check())
                  <input type="hidden" name="id" value="{{Auth::User()->id}}"/>
                @endif
                <input type="hidden" name="image" value="{{$p->image}}"/>
                <input type="hidden" name="product_id" value="{{$p->id}}"/>
              </form>
            </div>
          </div>
        </div>
      </div>
@endforeach
      <!-- /Product Single -->
    </div>
    {{$product->links()}}
