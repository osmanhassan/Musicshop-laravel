@extends('user.sales')

@section('contentt')

	@if($total != 0)

		<div style="background-color: gray; margin: 10px;text-align: center;">
			
			<h1>Sells on: {{$date}}</h1>

		</div>

		<ol>
			
			@foreach($informations as $info)

				<li style="margin-bottom: 20px">

					<a href="{{route('order.view', [$info['OrderId']])}}" style="text-decoration: none;">
						
						<div class="12u$" style="background-color: gray;padding: 10px">
							
							<span style="font-size: 20px">From {{$info['CustomerName']}}</span>

							<p style="text-align: right;">
								
								Sell: {{$info['total']}}/-

							</p>

							<p style="text-align: right;">
								
								Revenue: {{$info['revenue']}}/-

							</p>

						</div>

					</a>

				</li>

			@endforeach

		

		<hr>

		<div class="12u$">

			Total(BDT.)

			
			<span style="float: right;margin-right: 2%">Sell: {{$total}}/-</span>
			<span style="float: right;margin-right: 2%">Revenue: {{$totalrevenue}}/-</span>

		</div>
</ol>
		@else

			<h3>No sell on {{$date}}</h3>

	@endif

@endsection