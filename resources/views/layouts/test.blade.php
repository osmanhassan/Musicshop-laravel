

<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		@yield('styles')
		<link rel="stylesheet" href="/css/main.css" />

		
	</head>
	<body>

		<!-- Header -->
			<header id="header" style="background-color: #000">
				<div class="logo" style="width: 55px;"><a ><img src="/logo.png" style="width: 100%;" alt="logo"></a>
					</div>
					
					
					
			</header>

	

		
			

		<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					
					<div style="margin:50px 0 30px 0">

						<button style="margin-top: 20px"> <a href="{{route('home.index')}}" style="font-size: 20px;text-decoration: none;color: #fff">Home</a> </button>

						
						<button style="margin-top: 20px"> <a href="{{route('product.index')}}" style="font-size: 20px;text-decoration: none;color: #fff">Products</a> </button>

						
						<button style="margin-top: 20px"> <a href="{{route('orders.all')}}" style="font-size: 20px;text-decoration: none;color: #fff">Orders</a> </button>

						
						<button style="margin-top: 20px"> <a href="{{route('product.create')}}" style="font-size: 20px;text-decoration: none;color: #fff">Add Product</a> </button>

						
						<button style="margin-top: 20px"> <a href="{{route('user.sales')}}" style="font-size: 20px;text-decoration: none;color: #fff">Sells</a> </button>

						
						<button style="margin-top: 20px"> <a href="{{route('user.addAdmin')}}" style="font-size: 20px;text-decoration: none;color: #fff">Add Admin</a> </button>

						<button style="margin-top: 20px"> <a href="{{route('logout.index')}}" style="font-size: 20px;text-decoration: none;color: #fff">Log out</a> </button>

						

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