
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	

	

</head>

<body>

    <div >

    <h1>Votre E-Billet</h1>
<hr>



<div >
    <div >Société : {{$societe}}</div>
    <div >
        <p>  Depart :  {{$depart}} </p> 
        
        <p>  Destination :  {{$destination}}</p> 
        <p>  Départ : {{$h_dep}}</p>
        <p> Arrive : {{$h_dest}}</p>
        <p> Date : {{$d_dep}}</p>
        <p> Prix :  {{$prix}} DH</p>
        

</div>
<img src="C:/xampp/htdocs/Gare/public/images/qrcode.png" />


</div>
</div>
</body>

</html>
