@extends('layouts.customer')

@section('title')

	Musicshop

@endsection

@section('styles')

	<link rel="stylesheet" type="text/css" href="/jquery-ui.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="/jquery-ui.custom/jquery-ui.structure.css">
	<link rel="stylesheet" type="text/css" href="/jquery-ui.custom/jquery-ui.theme.css">
	<link rel="stylesheet" type="text/css" href="{{asset('jquery-ui/jquery-ui.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('jquery-ui/jquery-ui.structure.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('jquery-ui/jquery-ui.theme.css')}}">

@endsection

@section('content')

	<form method="post">
		{{csrf_field()}}
		<div class="row uniform">

			<div class="6u 12u$(xsmall)">
				<input type="text" id="search" name="search">
				@foreach($errors->all() as $err)

					<span style="color:red">{{$err}}</span>

				@endforeach
			</div>

			<div class="6u 12u$(xsmall)">
				<input type="submit" value="search">
			</div>

		</div>
	</form>

	<div class="grid-style">
		
		@if(session()->has('message'))

			@foreach(session('message') as $msg)

				<h3 style="color: green;">{{$msg}}</h3>

			@endforeach

		@endif

		@foreach($products as $product)
		<div>
			<div class="box">
				<div class="image fit" style="height: 50%">
					<img src="{{$product->image . '?nocache=<' . time()}}" alt="" style="height: 100%"/>
				</div>
				<div class="content">
					<header class="align-center" style="height: 80px;overflow-y: hidden;width: 100%">
						
						<h2>{{$product->name}}</h2>
					</header>
					<div style="height: 150px;overflow-y: hidden;width: 100%">
						<p>Ctatagory: {{$product->catagory}}</p>
						
						<p>Price: {{$product->price}}/-</p>

						<p>Model: {{$product->model}}</p>
					</div>
					
					<footer class="align-center" style="margin-top: 20px;">
						<a href="#" class="button alt" onclick="Add({{$product->id}},'{{$product->name}}',{{$product->price}});">Add to cart</a>
					</footer>
				</div>
			</div>
		</div>
		@endforeach

	</div>

	{{($products->links())}}

@endsection

@section('script')

		<script type="text/javascript" src="/jquery-ui.custom/external/jquery/jquery.js"></script>
		<script type="text/javascript" src="/jquery-ui.custom/jquery-ui.js"></script>
		<script type="text/javascript" src="{{asset('jquery-ui/jquery-ui.js')}}"></script>
			
		<script type="text/javascript">

		

			function Add(id, name, price){
				
				if(window.confirm("Are you sure to add this item to the cart?") == true){

					var xhr=new XMLHttpRequest();

					var formdata = new FormData();
					
					formdata.append("id", id);
					formdata.append("name", name);
					formdata.append("price", price);
					formdata.append( "_token", '{{csrf_token()}}');
					
					xhr.open("POST","{{route('cart.add.delete')}}",true);
					
					xhr.onreadystatechange=function(){

						if(xhr.readyState==4){

							alert(xhr.responseText);

						}

					}

					xhr.send(formdata);

				}

			}

		$('document').ready(function(){
			$('#search').autocomplete({
				source: '{{route('product.names')}}',
			});

		});
		

	</script>


@endsection

