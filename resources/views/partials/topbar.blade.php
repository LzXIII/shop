

<!-- header -->
<div id="header">
  <div class="container">
    <div class="pull-left">
      <!-- Logo -->
      <div class="header-logo">
        <a class="logo" href="/">
          <img src="./img/logo.png" alt="">
        </a>
      </div>
      <!-- /Logo -->


    </div>
    <div class="pull-right">
      <ul class="header-btns">
        <!-- Account -->
        <li class="header-account dropdown default-dropdown">
          <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
            <div class="header-btns-icon">
              <i class="fa fa-user-o"></i>
            </div>
            @if (Auth::guest())
            <strong class="text-uppercase">Il Mio Account <i class="fa fa-caret-down"></i></strong>
          @else
            <strong class="text-uppercase">{{Auth::User()->name}} <i class="fa fa-caret-down"></i></strong>
          @endif
          </div>
          <a href="login" class="text-uppercase">Login</a>/<a href="register" class="text-uppercase">Registrati</a>
          <ul class="custom-menu">
            <li><a href="checkout"><i class="fa fa-check"></i>Checkout</a></li>
            @if (Auth::guest())
            <li><a href="login"><i class="fa fa-unlock-alt"></i>Login</a></li>
            <li><a href="register"><i class="fa fa-user-plus"></i>Registrati</a></li>
          @else
            <li><a href="logout"><i class="fa fa-unlock-alt"></i>Logout</a></li>
          @endif
          </ul>
        </li>
        <!-- /Account -->

        <!-- Cart -->
        <li class="header-cart dropdown default-dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <div class="header-btns-icon">
              <i class="fa fa-shopping-cart"></i>
              @if (Auth::check())
              <span class="qty">{{Auth::User()->cart()->sum('quantity')}}</span>
              @endif
            </div>
            <strong class="text-uppercase">Carrello:</strong>
            <br>
            <span></span>
          </a>
          <div class="custom-menu">
            <div id="shopping-cart">
              <div class="shopping-cart-list">
                @if (Auth::check())
                @foreach (Auth::User()->cart()->get() as $product)
                <div class="product product-widget">
                  <div class="product-thumb">
                    <img src="./img/{{$product->image}}" alt="">
                  </div>
                  <div class="product-body">
                    <h3 class="product-price"> <span class="qty">x{{$product->quantity}}</span></h3>
                    <h2 class="product-name">{{$product->name}}</h2>
                  </div>
                  <a class="cancel-btn" href="{{ route('cruddelete',['id'=>$product->id])}}"><i class="fa fa-trash"></i></a>
                </div>
                @endforeach
                @endif
              </div>
              <div class="shopping-cart-btns">
                @if (Auth::check())
                {{-- {!! Form::open(['route'=>'cartpage'])!!} --}}
                  <a class="main-btn" href="{{ route('cartpage')}}">Carrello</a>
                    {{-- <input type="hidden" name="id" value="{{Auth::User()->id}}"> --}}
                {{-- {!! Form::close()!!} --}}
                @endif
                <form method="get" action="checkout">
                  <button class="primary-btn" type="submit">Checkout<i class="fa fa-arrow-circle-right"></i></button>
                </form>
              </div>
            </div>
          </div>
        </li>
        <!-- /Cart -->

        <!-- Mobile nav toggle-->
        <li class="nav-toggle">
          <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
        </li>
        <!-- / Mobile nav toggle -->
      </ul>
    </div>
  </div>
  <!-- header -->
</div>
