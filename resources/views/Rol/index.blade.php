@extends ('layouts.principal') 
<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  ROL CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 >LISTADO DE  ROL<a href="Rol/create"> <button class="btn btn-primary" >  Nuevo <span class="glyphicon glyphicon-user"></button></a></h1>


<!-- Saltos de linea-->
<br>
<br>
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->
<div class="absolute3">
		@include('Rol.search')
		
</div>	

<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descripción</th>
					<th>Acción</th>
				
				</thead>
               @foreach ($Rol as $rol)
			   <tbody>
					<td>{{ $rol->id}}</td>
					<td>{{ $rol->descripcion}}</td>
					<td>
					<a href=""  > <button class="btn btn-info btn-sm" > <span class="glyphicon glyphicon-eye-open"></button></a>
						<a href="{{URL::action('RolController@edit',$rol->id)}}"><Button  class="btn btn-success btn-lg btn-sm">
      <span class="glyphicon glyphicon-edit "></button></a>
                         <a href="" data-target="#modal-delete-{{$rol->id}}" data-toggle="modal"><button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove "></button></a>
					</td>
					</tbody>
					@endforeach
				@include('Rol.modal')
			
			</table>
	
		{{$Rol->render()}}
@endsection