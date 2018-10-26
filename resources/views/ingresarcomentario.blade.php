@extends('layouts.app')

@section('title', 'comentario')

@section('content')

<div class= "container">
		<h2>Comentario</h2> <!-- formulario para realizar la reserva-->
		<form class="form-group" method="POST" action="/reserva/guardarcomentario">
				@csrf
			<div class="form-group">
				<label for="">ID habitacion</label> <!-- aca se coloca el id del usuario a reservar, este campo ya esta definido con el valor. El usuario no lo puede cambair-->
				<input  type="text" name="id_habitacion" class="form-control" value="{{$habitacion->id_habitacion}}" readonly="readonly"  required>
			</div>
			<div class="form-group">
				<label for="">Comentario</label><!--se coloca el id de la habitacion a reservar, ya esta definido. El usuario no lo puede cambiar-->
				<textarea type="text" placeholder="Comparte tu opinión con nosotros..." name="comentario" class="form-control" required></textarea> 
			</div>
			<label for="">Calificación</label>
			<div>
				<div class="ec-stars-wrapper">
					<link rel="stylesheet" type="text/css" href="/css/estrellas.css" media="screen" />
					<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
					<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
					<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
					<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
					<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
				</div>
			</div>

		<button type="submit" class="btn btn-primary">Guardar</button>	<!-- nos direcciona al controlador donde se almacena la reserva-->
		<a href="/reservas" class="btn btn-primary" >volver</a>			<!-- nos direcciona a la vista principal de las reservas-->
</form>
</div>

@endsection
