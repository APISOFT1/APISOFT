@extends('layouts.principal')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  ASUARIO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 class="text-center">LISTADO DE USUARIOS</h1>

<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->
<div class="absolute3">
		@include('Usuario.search')

</div>

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
    <th>Genero</th>
  	<th>Rol</th>
		<th>Estado</th>
		<th>  <div class="size">
		  <a href="Usuario/create" class="create-modal btn btn-success btn-sm">
			<i class="glyphicon glyphicon-plus"></i>
			</a>
			</th>

  </thead>

 
  
  		@foreach ($usuarios as $usuario )
			<tbody>
  		<td>{{$usuario->id}}</td>
  		<td>{{$usuario->name}}</td>
      <td>{{$usuario->Apellido1}}</td>
  		<td>{{$usuario->Apellido2}}</td>
      <td>{{$usuario->Telefono}}</td>
  		<td>{{$usuario->email}}</td>
      <td>{{$usuario->Direccion}}</td>
  		<td>{{$usuario->Fecha_Ingreso}}</td>
			<td>{{$usuario->Genero->descripcion}}</td>
			<td>{{$usuario->Rol->descripcion}}</td>
			<td> <?php  if ($usuario->estado_id=='1') {
			# code...
			print("Activo");
		} else {
			print("Inactivo");
		}
		  ?></td> 
  		
			
	
   
  		<td>
			<a href=""  > <button class="btn btn-info btn-sm" > <span class="glyphicon glyphicon-eye-open"></button></a>
			<a href="{{URL::action('UserController@edit',$usuario->id)}}"><Button  class="btn btn-success btn-lg btn-sm">
      <span class="glyphicon glyphicon-edit "></button></a>
                         <a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove "></button></a>
  		</td>

			</tbody>
			@endforeach
		@include('Usuario.modal')
</table>
@endsection