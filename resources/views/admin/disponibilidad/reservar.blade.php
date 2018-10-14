@extends('layouts.app')

@section('title', 'reserva')

@section('content')

<div class= "container">
		<h2>Cancerlar Disponibilidad</h2>
		<form class="form-group" method="POST" action="/admin_disponibilidad/store">
				@csrf
			<div class="form-group">
				<label for="">ID usuario</label>
				<input  type="text" name="id_users" class="form-control" value="{{ Auth::user()->id}}" readonly="readonly" required  >
			</div>
			<div class="form-group">
				<label for="">ID Habitacion</label>
				<input type="text" name="id_habitacion" class="form-control" value="{{$habitacion->id}}" readonly="readonly" required >
			</div>
			<div class="form-group">
				<input type="hidden" name="num_personas" class="form-control" value="{{$habitacion->capacidad}}" readonly="readonly" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="cantidad" class="form-control" value="{{$habitacion->cantidad}}" readonly="readonly" required>
			</div>
			<div class="form-group">
				<label for="">Fecha Ingreso</label>
				<input type="date" name="fecha_ingreso"  min="<?php echo date('Y-m-d');?>" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Fecha Salida</label>
				<input type="date" name="fecha_salida" min="<?php echo date('Y-m-d');?>" class="form-control" required>
			</div>
			<div class="form-group">
				<input  type="hidden" name="estado" class="form-control" value="2">
			</div>

		<button type="submit" class="btn btn-primary">Guardar</button>
		<a href="/reserva_admin" class="btn btn-primary">volver</a>

</form>
</div>

@endsection
