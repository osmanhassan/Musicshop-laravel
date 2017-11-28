@extends('layouts.user')

@section('title')

	Sells

@endsection


@section('content')
	
	@yield('contentt')
	
	<div class="grid-style">
		
		<div>
			
			<div class="box">
				
				<div class="content">

					<header>	
						<h2>Sells By Date</h2>
					</header>

					<form method="post"  autocomplete="off"> 

						{{csrf_field()}}

						<input type="text" id="SalesDate" name="SalesDate" style="width:100%">

						@if(session()->has('smassage'))

							<span style="color: red">
								
								<br>{{session('smassage')}}<br>

							</span>

						@endif
						<div style="text-align: center;margin-top: 20px;">
						<input type="submit"  name ="Find" value="Find">
						</div>

					</form>
				</div>
			</div>

		</div>

		<div>
			
			<div class="box">
				
				<div class="content">

					<header>
						<h2>List By Top Sold</h2>

					</header>

					<form method="post" autocomplete="off"> 

						{{csrf_field()}}

						<input type="text" id="TopsoldDate" name="TopsoldDate" style="width: 100%">

						@if(session()->has('tmassage'))

							<span style="color: red">
								
								<br>{{session('tmassage')}}<br>

							</span>

						@endif

						<div style="text-align: center;margin-top: 20px;">
							<input type="submit" name ="FindList" value="Find List">
						</div>

					</form>

				</div>

			</div>

		</div>

		<div>
			
			<div class="box">
				
				<div class="content">

					<header>
						<h2>Tomorrow's Sell Prediction</h2>

					</header>

					<form method="post" style="text-align: center;"> 

						{{csrf_field()}}
						<input type="submit" value="Predict">

					</form>

				</div>

			</div>

		</div>

	</div>

	
			
		

	

@endsection

@section('script')
	
	
	
	<script type="text/javascript">

		$('document').ready(function(){

			
			$('#SalesDate').keydown(function(event){

				event.preventDefault();
			});
			$('#TopsoldDate').keydown(function(event){

				event.preventDefault();
			});

			$('#SalesDate').datepicker({

				maxDate:new Date,
			});
			$('#TopsoldDate').datetimepicker({

				maxDate:new Date,
				
				//format:'d-m-Y h:i A',

				format:'d-m-Y',

				formatdate:'d.m.Y',

				formatTime:'h:i A',

				step:15,

				theme:'dark',

				timepicker:false,
			});

		});

	</script>

@endsection