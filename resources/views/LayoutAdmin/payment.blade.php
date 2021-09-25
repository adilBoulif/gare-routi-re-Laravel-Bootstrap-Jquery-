<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Gare Online</title>

	<!-- Google font -->
	<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400" >

<link  type="text/css" rel="stylesheet"  href=" {{asset('css1/all.css')}}">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet"   href=" {{asset('css1/bootstrap.min.css')}}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet"  href=" {{asset('css1/style.css')}}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
    <a class="navbar-brand" href="{{  url('/Home')  }}" >Home</a>
  </div>
	</nav>
    <div class="container body-content">

<h3 style="    padding-top: 50px;">Effectuer le Payment</h3>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Depart</th>
      <th scope="col">Destination</th>
     
      <th scope="col">H_depart</th>
      <th scope="col">H_destination</th>
      <th scope="col">Date</th>
      <th scope="col">Prix</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach(Cart::content() as $pro)
    <tr>
     
      <td>{{$pro->model->depart}}</td>
      <td>{{$pro->model->destination}}</td>
      <td>{{$pro->model->h_dep}}</td>
      <td>{{$pro->model->h_dest}}</td>
      <td>{{$pro->model->d_dep}}</td>
      <td>{{$pro->price}} DH</td>
     
     
      <td>
      <form action="{{url('/Card/remove')}}" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="_token" value="{{Session::token()}}">
<button type="submit"  class="btn btn-danger"><i class="fas fa-trash"></i> </button>             
                </form>
      
      
    </td>
    </tr>
   @endforeach
 
  </tbody>
</table>


 <form action="/payment" method="post">
 {{csrf_field()}}
 <input type="hidden" class="form-control" name="depart" value="{{$pro->model->depart}}">
 <input type="hidden" class="form-control" name="destination" value="{{$pro->model->destination}}">
 <input type="hidden" class="form-control" name="h_dep" value="{{$pro->model->h_dep}}">
 <input type="hidden" class="form-control" name="h_dest" value="{{$pro->model->h_dest}}">
 <input type="hidden" class="form-control" name="d_dep" value="{{$pro->model->d_dep}}">
 <input type="hidden" class="form-control" name="price" value="{{$pro->price}} ">
 <input type="hidden" class="form-control" name="societe" value="{{$pro->model->relationSociete->nom }}">
 <script


 src="https://checkout.stripe.com/checkout.js" class="stripe-button"
 data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
 data-locale="auto"
 data-amount={{Cart::priceTotal()}}
 data-amount="Gare"
 data-key="pk_test_51ISNBoI0x6NmKCyPmVTFjYkMM7m4Q7w9jir3FrsunjKmhETw3qtupRj0kXNArFwzlBaBuMVhphJz3ZZaHPH1R4sn00tFHhyBD0"
 receipt_email="adelbf6@gmail.com"
 >
 </script>
 </form>
 </body>

</html>