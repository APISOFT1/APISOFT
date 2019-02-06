@extends('layouts.principal')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  AFILIADO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')

<h1 class="text-center">LISTADO DE  AFILIADOS<a href="Afiliado/create"></h1>
<div class="absolute">
<button class="btn btn-primary" >+ Crear Nuevo Afiliado</button></a>

</div>
<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->

		@include('Afiliado.search') 


<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
  	<th>Cedula</th>
  	<th><div class="size2">Afiliado</div></th>
  	<th>Telefono</th>
  	<th>Correo</th>
    <th>Direccion</th>
  	<th>FechaIngreso</th>
  	<th>Numero de Cuenta</th>
    <th>Genero</th>
  	<th>Estado Civil</th>
		<th>Estado</th>
		<th><div class="size">Accion</div></th>
  </thead>

 
  
  		@foreach ($afiliados as $afiliado )
			<tbody>
			
			<td>{{$afiliado->id}}</td>
			<td>{{$afiliado->Nombre}} {{$afiliado->Apellido1}} {{$afiliado->Apellido2}}</td>
      <td>{{$afiliado->Telefono}}</td>
  		<td>{{$afiliado->email}}</td>
      <td>{{$afiliado->Direccion}}</td>
  		<td>{{$afiliado->Fecha_Ingreso}}</td>
      <td>{{$afiliado->Num_Cuenta}}</td>
		  <td>{{$afiliado->Genero->descripcion}}</td>
	  	<td>{{$afiliado->Estado_Civil->descripcion}}</td>
	  	<td> <?php  if ($afiliado->estado_id=='1') {
			# code...
			print("Activo");
		} else {
			print("Inactivo");
		}
		  ?></td>  		
			
	
   
  		<td>
			<a href=""  > <button class="btn btn-info btn-sm" > <span class="glyphicon glyphicon-eye-open"></button></a>
			<a href="{{URL::action('AfiliadoController@edit',$afiliado->id)}}"><Button  class="btn btn-success btn-lg btn-sm">
      <span class="glyphicon glyphicon-edit "></button></a>
		
      <a href="" data-target="#modal-delete-{{$afiliado->id}}" data-toggle="modal"><button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove "></button></a>
												 
  		</td>
			</tbody>
			@endforeach
		@include('Afiliado.modal')
</table>
@endsection