

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
				
				<a style="vertical-align: top;"><img id="gn" src="/image/notification.png" style="height: 30px;width: 30px;border-radius: 50%;margin-top: 10px;">

					<label id="nc" style="margin-top: -50px;color:#fff"></label>

					<div id="nb" style="width: 200px;height: 250px;text-align: left;overflow-x: hidden;overflow-y: auto;display: none;padding: 10px">
						
						<ul id="nu" style="list-style: none;padding: 0">
							
						</ul>

					</div>
				</a>	
				

				<a href="#menu" style="font-size: 130%;vertical-align: top;">Menu</a>
					
			</header>

			

			<!-- Nav -->
			<nav id="menu">
				<ul class="links">

					
					<li><a href="{{route('product.index')}}">Products</a> </li>
					<li><a href="{{route('orders.all')}}">Orders</a></li>
					<li><a href="{{route('product.create')}}">Add Product</a></li>
					<li><a href="{{route('user.sales')}}">Sells</a></li>
					<li><a href="{{route('user.addAdmin')}}">Add Admin</a></li>
					<li><a href="{{route('logout.index')}}">Log out</a></li>
					
				</ul>
			</nav>
		
			

		<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner" id="gn">
	
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
			
			<script type="text/javascript">
				
				function countNotifications(){

					$.ajax({

						url: '{{route("notifications.index")}}',

						success: function(data){

							$('#nc').html(data);

						}

					});

				}

				function giveNotifications(){

					$.ajax({

						url: '{{route("notifications.give")}}',

						success: function(data){

							$('#nu').html(data);

							$('#nb').show(3000);

						}

					});

				}

				ncount=0;

				$('document').ready(function() {
					
					setInterval(countNotifications,3000);

					$('#gn').click(function(){

						if(ncount == 0){

							giveNotifications();
							
							ncount = 1;

						}

						else{

							$('#nb').hide(3000);
							ncount = 0;
						}



					});
						
					
				});

			</script>

		
	</body>
</html>