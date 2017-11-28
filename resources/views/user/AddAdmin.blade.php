@extends('layouts.user')

@section('title')

	Add Admin

@endsection

@section('content')
	<div class="box">

		<div class="content">
			<header class="align-center">

				<p>Fill up the form to add admin</p>

				<h2>Add Admin</h2>
				
			</header>

			@if(session()->has('message'))

				<p style="color: green">{{session('message')}}</p>

			@endif
			<form method="post">

				{{csrf_field()}}
				
				<div class="row uniform">

					<div class="6u 12u$(xsmall)">

						<input type="text" name="name" value="{{old('name')}}" placeholder="User name">

						@foreach($errors->get('name') as $err)

							<span style="color: red">{{$err}}</span>

						@endforeach

						<br>
						<input type="text" name="email" value="{{old('email')}}" placeholder="Email">

						@foreach($errors->get('email') as $err)

							<span style="color: red">{{$err}}</span>

						@endforeach

					</div>

					<div class="6u 12u$(xsmall)">

						<input type="password" name="password" placeholder="Password">

						@foreach($errors->get('password') as $err)

							<span style="color: red">{{$err}}</span>

						@endforeach

						<br>
						<input type="password" name="ConfirmPassword" placeholder="Confirm Password">

						@foreach($errors->get('ConfirmPassword') as $err)

							<span style="color: red">{{$err}}</span>

						@endforeach

					</div>

				</div>

		<div style="text-align: center; margin: 20px">

			<input type="submit" value="Add">

		</div>

	</form>

@endsection