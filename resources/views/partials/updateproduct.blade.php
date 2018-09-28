
      <!-- section title -->
      <div class="col-md-12">
        <div class="section-title">
          <h2 class="title">Modifica Prodotti</h2>
        </div>
        {{$product->links()}}
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
              <form method="get" action="update">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$p->id}}"/>
                <div class="form-group">
                  <label>Nome Prodotto</label>
                  <input class="input" type="text" name="name" placeholder="Nome Prodotto" value="{{$p->name}}" />
                </div>
                <div class="form-group">
                  <label>Prezzo</label>
                  <input class="input" type="text" name="price" placeholder="Prezzo" value="{{$p->price}}" />
                </div>
                <div class="form-group">
                  <label>Immagine</label>
                  <input class="input" type="file" name="image" value="{{$p->image}}" placeholder="Immagine" />
                </div>
                <button type="submit" class="primary-btn">Modifica Prodotto</button>
                </form>
              </div>
            </div>
          </div>
        </div>

@endforeach
      <!-- /Product Single -->
