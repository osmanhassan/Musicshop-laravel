@extends('layouts.user')

@section('title')

	Products

@endsection 

@section('style')

	<link rel="stylesheet" type="text/css" href="/jquery-ui.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="/jquery-ui.custom/jquery-ui.structure.css">
	<link rel="stylesheet" type="text/css" href="/jquery-ui.custom/jquery-ui.theme.css">
	<link rel="stylesheet" type="text/css" href="{{asset('jquery-ui/jquery-ui.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('jquery-ui/jquery-ui.structure.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('jquery-ui/jquery-ui.theme.css')}}">

@endsection

@section('content')

	<div style="width: 95%;margin: 0 auto;margin-top: 50px;">

		<div style="font-size: 20px;margin-bottom: 50px;text-align: center;">

			<a href="{{route('product.index')}}"><button style="margin-top: 20px">All</button></a>

			<a href="{{route('product.stockout')}}"><button style="margin-top: 20px">Stock Outs</button></a>
			
		</div>

		

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

		@foreach($product as $pro)

				<div>
					<div class="box">

					<div class="image fit" style="height: 60%">
						<img id='{{"img".$pro->id}}' src="{{$pro->image . '?nocache=<' . time()}}" alt="" style="height: 100%" />
						<label>
							<img src="/image/cameral.png" style="width:70px;height:70px;margin-top:-70px;"/>
							<input class="pic" id="{{$pro->id}}" type="file" style="display:none"/>
						</label>
					</div>

					<div class="content">

						<p>Name: {{$pro->name}}</p>

						<p>Catagory: {{$pro->catagory}}</p>

						<p>Model: {{$pro->model}}</p>

						<p>Buying Price: {{$pro->bprice}}BDT.</p>

						<p>Selling Price: {{$pro->price}}BDT.</p>

						<p>Quantity: {{$pro->quantity}}</p>

					</div>

					<footer class="align-center" style="padding: 0 10px 20px 10px;">

						<a href="{{route('product.edit', [$pro->id])}}" style="text-decoration: none;">
							
							<input type="button" value="Edit" style="margin-top: 20px">

						</a>

						<a class="delete" name="{{$pro->id}}" href="#" style="text-decoration: none;">
							
							<input type="button" value="Delete" style="margin-top: 20px">

						</a>

					</footer>

				</div>
			</div>
		@endforeach

	</div>
	{{($product->links())}}
	@foreach($catagories as $catagory)

		<a href="{{route('show.catagory',[$catagory->catagory])}}"><button style="margin-top: 20px">{{$catagory->catagory}}</button></a>

	@endforeach
	
@endsection 



@section('script')

	
	<script type="text/javascript" src="/jquery-ui.custom/external/jquery/jquery.js"></script>
	<script type="text/javascript" src="/jquery-ui.custom/jquery-ui.js"></script>
	<script type="text/javascript" src="{{asset('jquery-ui/jquery-ui.js')}}"></script>

	<script type="text/javascript">
		
		$('document').ready(function(){

			$( ".delete" ).each(function( index, element ) {
			  
			    var id = $( element ).attr( "name");

			    var url = "/product/delete/" + id;
			    
			    $(element).click(function(){

			    	if(confirm('Click ok to delete this item\nClick cancel to cancel delete')==true)
			    	window.location.href = url;

			    });


			  });

			$('.pic').each(function(index,element){

				$(element).change(function(){

					var formdata = new FormData();
			
					formdata.append("pic", element.files[0]);
					formdata.append("_token", "{{ csrf_token() }}");

					var u = '/product/changeimage/'+ $( element ).attr( "id");

					var id = '#img' + $( element ).attr( "id");

					req = new XMLHttpRequest();
			
					req.open("POST", u, true);
					
					req.onreadystatechange = function(){
						
						if(req.readyState==4){
							
							$(id).attr("src",req.responseText);
							
							
						}
					}
					req.send(formdata);
				});

			});

			$('#search').autocomplete({
				source: '{{route('product.names')}}',
			});

		});

	</script>
@endsection