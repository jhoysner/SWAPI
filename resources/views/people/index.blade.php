<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>people</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

</head>
<body>

	<div class="container">
		<h1 class="text-center">Personajes The Star Wars API </h1>
			
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<table class="table" id="table" >
					 <thead>
				        <tr>
				            <th>Nombre</th>
				            <th>Especie</th>
				            <th>Genero</th>
				        </tr>
				    </thead>
					  <tbody>

					  	@isset($sorts)
					  	
							@foreach ($sorts as $people)

								<?php $segments = explode('/', $people['url']); ?> 	
						    <tr>
						      <td>
								<a href="{{route('find.people', $segments[5])}}">
						      		{{$people['name']}}
								</a>
						  	  </td>					      
						  	  <td>
						      		@foreach ($people['species'] as $specie)
						      			{{$specie}}
						      		@endforeach
						  	  </td>
						      <td>
						      						
								@if ($people['gender'] == 'male')
									<i class="icon-male" style='color: black'></i> 
								
								@elseif($people['gender'] == 'female')
				
									<i class="icon-female" style='color: pink'></i> 

								@else
									<i class="icon-question-sign" style='color: red'></i>

								@endif
						      </td>
						    </tr>
							@endforeach								  	
						@endisset
					  		
						@empty($sorts)
					
							@foreach ($peoples['results'] as $people)

								<?php $segments = explode('/', $people['url']); ?> 	
						    <tr>
						      <td>
								<a href="{{route('find.people', $segments[5])}}">
						      		{{$people['name']}}
								</a>
						  	  </td>					      
						  	  <td>
						      		@foreach ($people['species'] as $specie)
						      			{{$specie}}
						      		@endforeach
						  	  </td>
						      <td>
						      						
								@if ($people['gender'] == 'male')
									<i class="icon-male" style='color: black'></i> 
								
								@elseif($people['gender'] == 'female')
				
									<i class="icon-female" style='color: pink'></i> 

								@else
									<i class="icon-question-sign" style='color: red'></i>

								@endif
						      </td>
						    </tr>
							@endforeach
						@endempty
					  </tbody>
					</table>					
				</div>		
			
			</div>
			<div class="row">
				<div class="col-md-3 offset-md-2">
					<form action="/" method="POST" >
						@csrf
						<input type="hidden"  name="url" value="{{$peoples['previous']}}">	
						<input type="submit" class="btn btn-info" value="Previous" >
					</form>	
					
				</div>
				<div class="col-md-3">
					
					<form action="#"  method="POST">
		                    {{ csrf_field() }}
		                    <?php 
		                   		 $segments = explode('/', $peoples['next']);
		                    	 $segment	 = explode('=' , $segments[5]);
		                    	 $uri = $segment[1]-1;
		                     ?>
		                    <input type="hidden" value="ordenar" name="ordenar">
		                    <input type="hidden" value="{{$uri}}" name="uri_sort">
							<input type="submit"  class="btn btn-info " value="Ordenar por especie">
		            </form>
				</div>
				<div class="col-md-3 offset-md-1">
					<form action="/" method="POST">
						@csrf
						<input type="hidden" name="url" value="{{$peoples['next']}}" >	
						<input type="submit" class="btn btn-info " value="Next">
					</form>			
					
				</div>
			</div>
				

		</div>
		
	</div>

</body>
</html>