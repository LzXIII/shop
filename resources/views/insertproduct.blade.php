@extends ('template.main')
@section ('body')
@include ('partials.topbar')
<div class="col-md-6">
  <h4 class="text-uppercase">Inserimento Nuovo Prodotto</h4>
  <p></p>
  <form class="review-form" method="post" action="store" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label>Nome Prodotto</label>
      <input class="input" type="text" name="name" placeholder="Nome Prodotto" />
    </div>
    <div class="form-group">
      <label>Prezzo</label>
      <input class="input" type="text" name="price" placeholder="Prezzo" />
    </div>
    <div class="form-group">
      <label>Immagine</label>
      <input class="input" type="file" name="image" placeholder="Immagine" />
    </div>
    <div class="form-group">
      <div class="input-rating">
        <strong class="text-uppercase">Your Rating: </strong>
        <div class="stars">
          <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
          <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
          <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
          <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
          <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
        </div>
      </div>
    </div>
    <button type="submit" class="primary-btn">Invio</button>
  </form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
@endif
@endsection
