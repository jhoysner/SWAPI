<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>people</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<h1 class="text-center">Personaje</h1>
			<center>
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <h5 class="card-title">{{$people['name']}}</h5>
			    <h6 class="card-subtitle mb-2 text-muted">Genero : {{ $people['gender']}}</h6>
			    <p class="card-text">

			    	Altura : {{$people['height']}} <br>
			    	Peso : {{$people['mass']}} <br>
			    	Año de nacimiento : {{$people['birth_year']}} <br>
			    	Color de Piel : {{$people['skin_color']}} <br>
			    </p>
			  </div>
			</div>
			<br>
			<a href="{{url('/')}}" class="btn btn-info"> Atras</a>
			</center>

		</div>
	</div>
	
</body>
</html>