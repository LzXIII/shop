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
            <img src="./img/product01.jpg" alt="">
          </div>
          <div class="product-body">
            <h3 class="product-price">{{$p->price}}</h3>
            <h2 class="product-name"><a href="#">{{$p->name}}</a></h2>
            <div class="product-btns">
              <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
              <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
              <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div>
      </div>
@endforeach
      <!-- /Product Single -->
    </div>
