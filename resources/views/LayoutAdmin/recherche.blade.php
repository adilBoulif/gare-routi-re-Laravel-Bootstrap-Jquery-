
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
    <a class="navbar-brand" href="{{  url('/Home')  }}">Home</a>
  </div>
	</nav>
    <div class="container body-content">

<h3 style="    padding-top: 50px;">résultats de recherche</h3>
@foreach($tra as $t)
<form action="{{ url('/Reserve',['id' => $t->id]) }}" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="_token" value="{{Session::token()}}">
<div class="panel panel-default" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    margin-top: 55px;">
    <div class="panel-heading">Société {{$t->relationSociete->nom }}</div>
    <div class="panel-body">
        <p>  {{$t->depart}} <i class="fas fa-route"></i> {{$t->destination}}</p> 
        <p> <i class="far fa-clock"></i> Départ : {{$t->h_dep}}</p>
        <p> <i class="fas fa-clock"></i> Arrive : {{$t->h_dest}}</p>
        <div style="float: right;margin-top: -85px;font-size: 26px;position:absolute;right: 146px;"><?php
$prixFinal=$nump*$t->prix
?> {{$prixFinal}} DH</div>
<input type="hidden" class="form-control" name="pf" value="{{$nump}}">
        <input type="submit" class="btn btn-success" style="float:right; margin-top: -40px;    width: 117px;" value="Reserver" />
    </div>

</div>
</form>
@endforeach

</div>
</div>

</div>
</body>

</html>