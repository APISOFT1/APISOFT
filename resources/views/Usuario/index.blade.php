@extends('layouts.Admin')
@section ('contenido')
<div class="row">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Listado de Generos <a href="" class="btn btn-success" data-toggle="modal" data-target="#createUsuario">
	
    Nuevo</a></h3>
		@include('Usuario.search')
		</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
  	<th>Cedula</th>
  	<th>Nombre</th>
  	<th>Apellido1</th>
    <th>Apellido2</th>
  	<th>Telefono</th>
  	<th>Correo</th>
    <th>Direccion</th>
  	<th>FechaIngreso</th>
  	<th>Clave</th>
    <th>Genero</th>
  	<th>Rol</th>
		<th>Estado</th>
		
  	

  </thead>

 
  	<tr>
  		@foreach ($usuarios as $usuario )
  		<td>{{$usuario->id}}</td>
  		<td>{{$usuario->name}}</td>
      <td>{{$usuario->Apellido1}}</td>
  		<td>{{$usuario->Apellido2}}</td>
      <td>{{$usuario->Telefono}}</td>
  		<td>{{$usuario->email}}</td>
      <td>{{$usuario->Direccion}}</td>
  		<td>{{$usuario->Fecha_Ingreso}}</td>
      <td>{{$usuario->password}}</td>
			<td>{{$usuario->Genero->descripcion}}</td>
			<td>{{$usuario->Rol->descripcion}}</td>
			<td>{{@$usuario->Estados->Descripcion}}</td>
  		
			
	
   
  		<td>
			<a href="" class="btn btn-success" data-toggle="modal" data-target="#editarUsuario">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
  		</td>

  	</tr>
		@include('Usuario.modal')
		@include('Usuario.create')
		@include('Usuario.editar')
  	@endforeach
	


</table>

	</div>
	</div>
</div>






@endsection