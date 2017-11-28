@extends('layouts.customer')

@section('title')
	
	My cart

@endsection

@section('content')
<div class="box">
		<div class="content">
			<header class="align-center">
				<p>Place order by clicking place order button</p>
				<h2 style="font-size: 250%">My Cart</h2>
			</header>
	

			@if(sizeof(session('cart'))>0)
			<div class="12u$" style="text-align: right;">
				<input onclick="confirmation()" type="button" class="button special" id="confirm" value="Place Order" style="font-size: 20px;">
			</div>
			@endif

			

			<ol style="font-size: 30px;">
				
				@php($total = 0)
				@php($id = 0)

				@foreach($carts as $cart)

					

						<li id="i{{$id}}">
							
							<div class="12u$" style="color: #fff;background-color: gray;margin-top: 20px;padding: 10px">
								{{$cart['name']}}

								
								<p style="float: right;">{{$cart['price']}}/-</p><br>

								<input type="button" value="Discard" style="margin-right: 10px;"
								onclick="discard({{$id}},{{$cart['id']}})">

							</div>
						</li>

					

					@php($total += $cart['price'])
					@php($id++)

				@endforeach

				<hr>

				<div class="12u$" style="color: #000;margin-top: 20px;padding: 10px">

					Total
			
					<p id="total" style="float: right;">{{$total}}/-</p>

				</div>
				
			</ol>		

		</div>

	</div>
@endsection

@section('script')

	<script type="text/javascript">
		
		function discard(id, cid){

				
			if(window.confirm("Are you sure to discard this item from the cart?") == true){

				var xhr=new XMLHttpRequest();

				var formdata = new FormData();
				
				formdata.append("id", cid);
				var st = document.getElementById("total").innerHTML;
				formdata.append("total", st);
				formdata.append( "_token", '{{csrf_token()}}');
				
				xhr.open("POST","{{route('cart.add.delete')}}",true);
				
				xhr.onreadystatechange=function(){

					if(xhr.readyState==4){

						id='i'+id;
						document.getElementById(id).style.display='none';

						document.getElementById("total").innerHTML = xhr.responseText;

						var t = document.getElementById("total");

						if(t.innerHTML === '0'){

							document.getElementById("confirm").style.display='none';

						}

						

					}

				}

				xhr.send(formdata);

			}

		}
			
	</script>

	<script type="text/javascript">
		
		function confirmation(){

			if(window.confirm("For adding or discarding more items click cancel.\nFor confirming order press ok.") == true){

				window.location.href = "{{route('order.index')}}";

			}

		}

	</script>

@endsection