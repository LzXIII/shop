@extends ('template.main')
@section ('body')
  @include ('partials.topbar')

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
        @if (Auth::guest())
        <form id="checkout-form" class="clearfix">
					<div class="col-md-6">
						<div class="billing-details">
							<p>Sei già un cliente? <a href="login">Login</a></p>
							<div class="section-title">
								<h3 class="title">Dettagli dell'ordine</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="fname" placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="lname" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>

							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="register">
									<label class="font-weak" for="register">Creare un account?</label>
									<div class="caption">
										<p>
											<p>
												<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div>
						</div>
					</div>
        @endif
					<div class="col-md-6">
						{{-- <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Scegli metodo di spedizione</h4>
							</div>
              {!! Form::open(['route' => 'checkout'])!!}
							<div class="input-checkbox">
								<input type="radio" value="8" name="shipping" id="shipping-1" checked>
								<label for="shipping-1">Corriere - € 8.00</label>
								<div class="caption">
									<p>
										<p>
								</div>
							</div>
              {!! Form::close()!!}
              {!! Form::open(['route' => 'checkout'])!!}
							<div class="input-checkbox">
								<input type="radio" value="4" name="shipping" id="shipping-2">
								<label for="shipping-2">Standard - € 4.00</label>
								<div class="caption">
									<p>
										<p>
								</div>
							</div>
              {!! Form::close()!!}
						</div> --}}

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Metodi di pagamento</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked>
								<label for="payments-1">Bonifico bancario</label>
								<div class="caption">
									<p>
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-3">
								<label for="payments-3">Paypal</label>
								<div class="caption">
									<p>
										<p>
								</div>
							</div>
						</div>
					</div>
          @include ('partials.cart')
          <div class="pull-right">
            <a href="{{route('buy')}}" class="primary-btn">Ordina</a>
          </div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection
