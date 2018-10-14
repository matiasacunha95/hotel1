@extends('layouts.app')

@section('title', 'Error_fecha')

@section('content')

	<h2 align="center">Fecha incorrecta</h2>
	<table class="table table-responsive table-striped">
    <div align="center" class="alert alert-danger" role="alert">La fecha de inicio tiene que ser menor que la final</div>
    <div align="center">
    	<a href="/admin_disponibilidad/create" class="btn btn-primary" onClick="javascript:history.go(-1)">volver</a>
    </div>
@endsection