@extends('layouts.user')

@section('title')

	Order

@endsection


@section('content')

	<div class="box" style="padding: 10px">

	
		
		@php($customer = unserialize($order->customer))

		<p style="font-size: 20px">Name : {{$customer['name']}}</p>
		<p style="font-size: 20px">Phone : {{$customer['phone']}}</p>
		<p style="font-size: 20px">bkash : {{$customer['bkash']}}</p>
		<p style="font-size: 20px">Address : {{$customer['address']}}</p>
		<p style="font-size: 20px">Placed on : {{$order->date}}</p>

		@if($order->status == 'Not Delivered')

			<input type="button" id="DeliveyStatus" value="Deliver" onclick="DeliverOrder({{$order->id}})">

		@else

			<p style="font-size: 20px">Delivered on : {{$order->delivery_date}}  By {{$order->delivered_by}}. </p>

		@endif

		<footer>
			
			@php($orders = unserialize($order->orders))
			@php($total = 0)

			<ol>

				@foreach($orders as $odr)

					
						
						<li style="margin-top: 10px">

							<div class="12u$" style="color: #fff;background-color: gray;margin-top: 20px;padding: 10px">

							{{$odr['name']}}

							<p style="float: right;">{{$odr['price']}}/-</p>

						</div>

						</li>

					

					@php($total += $odr['price'])
				@endforeach

				<div class="12u$" style="color:#000;margin-top: 20px;padding: 10px">
					Total: 
					<p style="float: right;">{{$total}}/-</p>

				</div>
		</ol>
		</footer>

	</div>
	
	
@endsection

@section('script')

	<script type="text/javascript">
		
		function DeliverOrder(){

			window.location.href = "{{route('order.deliver', [$order->id])}}";
		}

	</script>

@endsection