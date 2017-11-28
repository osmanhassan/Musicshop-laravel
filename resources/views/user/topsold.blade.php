@extends('user.sales')

@section('contentt')

	@if($flag == 1)

		<div style="background-color: gray;text-align: center;">
			
			<h1>Topper list of date: {{$date}}</h1>

		</div>

		<div class="grid-style">
			
			
			@foreach($products as $product)
				<div>

					<div class="box">
						<div class="content">
							<header>
								
								<h2>Name: {{$product['name']}}</h2>
								<h2>Price: {{$product['price']}}</h2>
								<h2>Sold: {{$product['instances']}}</h2>

							</header>
						</div>
					</div>

				</div>

			@endforeach

		</div>

	@else

		@if($flag == 0)

		<h2>No sell on: {{$date}}</h2>

		@else

			<h3>{{$prediction}}</h3>

		@endif

	@endif

@endsection