@extends('layouts.Admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuario <a href="Usuario/create"><button class="btn btn-success">Nuevo</button></a></h3>
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
			<td>{{$usuario->Estado->Descripcion}}</td>
  		
			
	
   
  		<td>
			<a href="{{URL::action('UserController@edit',$usuario->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
  		</td>

  	</tr>
		@include('Usuario.modal')
  	@endforeach
	


</table>

	</div>
	</div>
</div>






@endsection