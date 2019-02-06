@extends('layouts.principal')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  AFILIADO-APIARIO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')

<h1 class="text-center">LISTADO DE  AFILIADO-APIARIO<a href="AfiliadoApiario/create"></h1>
<div class="absolute">
<button class="btn btn-primary" >+ Crear Nuevo Afiliado-Apiario</button></a>
</div>

<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->
<!--Esta clase nos permite posicionar el buscador  -->
<div class="absolute3">
		@include('AfiliadoApiario.search')
		</div>


		<div class="table-responsive">
		<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
  	<th>Codigo</th>
  	<th>Afiliado</th>
  	<th>Apiario</th>
	<th>Accion</th>
  </thead>

 
  <tbody>
  		@foreach ($afiliadoapiarios as $afiliado )
  		<td>{{$afiliado->id}}</td>
  		<td>{{$afiliado->afiliado->Nombre}} {{$afiliado->afiliado->Apellido1}} {{$afiliado->afiliado->Apellido2}}</td>
      <td>{{$afiliado->apiario->Descripcion}}</td>
  
  		
			
	
   
  		<td>
		  <a href=""  > <button class="btn btn-info btn-sm" > <span class="glyphicon glyphicon-eye-open"></button></a>
			<a href="{{URL::action('AfiliadoApiarioController@edit',$afiliado->id)}}"><Button  class="btn btn-success btn-lg btn-sm"><span class="glyphicon glyphicon-edit "></button></a>
                         <a href="" data-target="#modal-delete-{{$afiliado->id}}" data-toggle="modal"><button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove "></button></a>
  		</td>

		  </tbody>
		  @endforeach
		@include('AfiliadoApiario.modal')
</table>
@endsection
