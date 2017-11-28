

<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		
		<link rel="stylesheet" href="/css/main.css" />
		<link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="/css/jquery-ui.structure.css">
		<link rel="stylesheet" type="text/css" href="/css/jquery-ui.theme.css">
		<link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.min.css">

		

		@yield('styles')
		
	</head>
	<body>

		<!-- Header -->
			<header id="header" style="background-color: #000">
				<div class="logo" style="width: 55px;"><a ><img src="/image/logo.png" style="width: 100%;height: 100%" alt="logo"></a>
					</div>
					
					<a href="#menu" style="font-size: 130%">Catagories</a>
					
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">

					@foreach($catagories as $catagory)

						<li><a href="{{route('catagory.show', [$catagory->catagory])}}">{{$catagory->catagory}}</a></li>

					@endforeach
					
				</ul>
			</nav>


		<!-- Banner -->
			

		<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					
					<div style="margin:50px 0 30px 0">

						<button style="margin-top: 20px"> <a href="{{route('dashboard.index')}}" style="font-size: 20px;text-decoration: none;color: #fff">home</a> </button>

						<button style="margin-top: 20px"> <a href="{{route('showCart')}}" style="font-size: 20px;text-decoration: none;color: #fff">Show Cart</a> </button>

					</div>

						@yield('content')

					
				</div>

			</section>

		


		<!-- Footer -->
			<footer id="footer">
				
				<div class="copyright">
					&copy; Untitled. All rights reserved.
				</div>
			</footer>

		<!-- Scripts -->
			<!-- Scripts -->
			<script type="text/javascript" src="/js/jquery-3.2.1.js"></script>
			<script type="text/javascript" src="/js/jquery.js"></script>
			<script type="text/javascript" src="/js/jquery-ui.js"></script>
			<script type="text/javascript" src="/js/jquery.datetimepicker.full.min.js"></script>
			<script type="text/javascript" src="/js/jquery.datetimepicker.js"></script>
			@yield('script')
			<script src="/js/jquery.scrollex.min.js"></script>
			<script src="/js/skel.min.js"></script>
			<script src="/js/util.js"></script>

			<script src="/js/main.js"></script>
			
			

		
	</body>
</html>