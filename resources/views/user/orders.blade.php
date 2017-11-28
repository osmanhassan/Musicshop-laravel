@extends('layouts.user')

@section('title')

	Orders

@endsection

@section('content')
	
	<div style="text-align: center;margin: 50px;">

		<a href="{{route('orders.all')}}"><button>All</button></a>
		<a href="{{route('orders.delivered')}}"><button style="margin: 20px 0 20px 0">Delivered</button></a>
		<a href="{{route('orders.notdelivered')}}"><button>Not Delivered</button></a>

	</div>

	<h3 style="color: green">{{session('DeliveryMessage')}}</h3>

	<div class="grid-style">
	
			@foreach($orders as $order)
				<a href="{{route('order.view', [$order->id])}}" style="color: #000; text-decoration: none">

					<div>
					
						<div class="box">
							<div class="content">
									@php($customer = unserialize($order->customer))
									<header style="text-align: center;">
									
										<p>{{$order->id}}.</p>

										<h2>From {{$customer['name']}}</h2>
									</header>

									<p>On: {{$order->date}}</p>
									<p>Status: {{$order->status}}</p>

							</div>

						</div>

					</div>
				</a>

					

			

			@endforeach

	</div>

@endsection