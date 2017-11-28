@extends('layouts.user')

@section('title')

	Add Products

@endsection 

@section('content')
	
	<div class="box">

		<div class="content">
			<header class="align-center">

				<p>Fill up the form to add product</p>
				<h2>Add product</h2>

			</header>

			<form method="post">

				{{csrf_field()}}

				<div class="row uniform">

					<div class="6u 12u$(xsmall)">

							<input type="text" name="name" value="{{old('name')}}" placeholder="Name">

							@foreach($errors->get('name') as $err)

								<span style="color: red">
									
									{{$err}}

								</span>

							@endforeach

							<br>
							<input type="text" name="BuyingPrice" value="{{old('BuyingPrice')}}" placeholder="Buying Price">

							@foreach($errors->get('BuyingPrice') as $err)

								<span style="color: red">
									
									{{$err}}

								</span>

							@endforeach
							
						
							<br>
							<input type="text" name="SellingPrice" value="{{old('SellingPrice')}}" placeholder="Selling Price">

							@foreach($errors->get('SellingPrice') as $err)

								<span style="color: red">
									
									{{$err}}

								</span>

							@endforeach

							@if(session()->has('massage'))
							
								<span style="color: red">
										
										<br>{{session('massage')}}<br>

								</span>

							@endif
							</div>
							
							<div class="6u 12u$(xsmall)">
								<input type="text" name="model" value="{{old('model')}}" placeholder="Model">

								@foreach($errors->get('model') as $err)

									<span style="color: red">
										
										{{$err}}

									</span>

								@endforeach
								
								<br>
								<input type="text" name="catagory" value="{{old('catagory')}}" placeholder="Catagory">

								@foreach($errors->get('catagory') as $err)

									<span style="color: red">
										
										{{$err}}

									</span>

								@endforeach
						
								<br>
								<input type="text" name="quantity" value="{{old('quantity')}}" placeholder="Quantity">

								@foreach($errors->get('quantity') as $err)

									<span style="color: red">
										
										{{$err}}

									</span>

								@endforeach

							</div>

						</div>

						<div class="12u$" style="text-align: center;margin-top: 20px;">

							<input type="submit" value="Add">
						</div>
						
					</form>

				</div>	
	
			</div>
			

@endsection 

