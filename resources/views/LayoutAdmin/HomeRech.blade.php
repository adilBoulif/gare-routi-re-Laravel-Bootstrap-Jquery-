<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Gare En ligne</title>

	<!-- Google font -->
	<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400" >

<link  type="text/css" rel="stylesheet" href=" {{asset('css1/all.css')}}">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet"  href="{{asset('css1/bootstrap.min.css')}}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('css1/style.css')}}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
<div style="background: black;">
<a  style="    color: white;"name="" id="" class="btn btn-dark" href="{{ url('/login') }}" role="button" ><i class="fas fa-sign-in-alt"></i> Se connecter</a>
</div>
	<div id="booking" class="section">
	
    
	

		<div class="section-center">
		
			<div class="container">
			
				<div class="row">
					<div class="booking-form">
					<form action="{{  url('/rechercher')  }}" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="_token" value="{{Session::token()}}">
							<div class="row no-margin">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Départ</span>
									
										<select class="form-control" id="depart" name="depart">
										<option value="" selected disabled>Ville du Départ...</option>
													<option>Casablanca</option>
													<option>Rabat</option>
													<option>Kenitra</option>
												</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row no-margin">
										<div class="col-md-5">
											<div class="form-group">
										<span class="form-label">Destination</span>
								
										<select class="form-control" id="destination" name="destination">
										<option value="" selected disabled>Ville d'arrivéé...</option>
													<option >Casablanca</option>
													<option>Rabat</option>
													<option>Kenitra</option>
												</select>
									</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<span class="form-label">Date</span>
												<input name="date" id="date" class="form-control" type="date" required>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<span class="form-label">Passager</span>
												<select class="form-control" id="num" name="num">
													<option>1</option>
													<option>2</option>
													<option>3</option>
												</select>
												<span class="select-arrow"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-btn">
										<button class="submit-btn">Rechercher</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>