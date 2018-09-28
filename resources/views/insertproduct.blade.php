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
    <div class="alert alert-success"><span class="glyphicon glyphicon-plus"></span><em> {!! session('success') !!}</em></div>
@endif
@endsection
