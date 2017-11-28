@extends('layouts.customer')

@section('title')
	
	My cart

@endsection

@section('content')

	<div class="box">
		<div class="content">
			<header class="align-center">
				<p>Fill up the form to order</p>
				<h2 style="font-size: 250%">Place Order</h2>
			</header>
			
			<form method="post" >

				{{csrf_field()}}
					<div class="row uniform">

						<div class="6u 12u$(xsmall)">

							<input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Name" />
							
							@foreach($errors->get('name') as $err)

								<span style="color: red">{{$err}}</span>

							@endforeach

							<br>
							<input type="text" name="phone" id="phone" value="{{old('phone')}}" placeholder="Phone number" />

							@foreach($errors->get('phone') as $err)

								<span style="color: red">{{$err}}</span>

							@endforeach

							<br>
							<input type="text" name="address" id="address" value="{{old('address')}}" placeholder="Your address" />

							@foreach($errors->get('address') as $err)

								<span style="color: red">{{$err}}</span>

							@endforeach

						</div>

						<div class="6u$ 12u$(xsmall)">

							<input type="password" name="bkash" id="bkash" value="" placeholder="Bkash number" />

							@foreach($errors->get('bkash') as $err)

								<span style="color: red">{{$err}}</span>

							@endforeach
							
							<br>
							<input type="password" name="confirm_bkash" id="confirm_bkash" value="" placeholder="Confirm bkash" />

							@foreach($errors->get('confirm_bkash') as $err)

								<span style="color: red">{{$err}}</span>

							@endforeach
							
							
						</div>
						
					
						<div class="12u$" style="text-align: center">
							
							<input type="submit" class="button special"  value="Order" />
						
						</div>
					</div>
				
			</form>
		</div>
	</div>

	

@endsection