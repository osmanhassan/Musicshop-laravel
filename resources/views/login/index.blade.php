<!DOCTYPE html>

<html>
	<head>
		<title>Log In</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

	
		<link rel="stylesheet" href="/css/main.css" />

		
	</head>
	<body>

		<!-- Header -->
			<header id="header" style="background-color: #000">
				<div class="logo" style="width: 55px;"><a ><img src="/image/logo.png" style="width: 100%;height: 100%" alt="logo"></a>
					
					</div>


			
			</header>


		<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="box">

						<div class="content">
							<header class="align-center">

								<p>Log in for admin panel</p>
								<h2>Log In</h2>

							</header>

							<form method="post">
								{{csrf_field()}}
							<div class="row uniform">

								<div class="12u$">

									<input type="text" name="username" value="{{session('username')}}" placeholder="username">

									<br>

									<input type="password" name="password" placeholder="Password">

									<div style="text-align: center;">
										{{session('message')}}<br>
										<input type="submit" value="Login">
									</div>

									
								</div>

							</div>
							</form>

						</div>

					
					</div>

				</section>

		<!-- Footer -->
			<footer id="footer">
				
				<div class="copyright">
					&copy; Untitled. All rights reserved.
				</div>
			</footer>

		
	</body>
</html>