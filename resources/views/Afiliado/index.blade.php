@extends('layouts.Admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Afiliados <a href="Afiliado/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('Afiliado.search')
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
  	<th>Numero de Cuenta</th>
    <th>Genero</th>
  	<th>Estado Civil</th>
	<th>Estado</th>
		
  	

  </thead>

 
  	<tr>
  		@foreach ($afiliados as $afiliado )
  		<td>{{$afiliado->id}}</td>
  		<td>{{$afiliado->Nombre}}</td>
        <td>{{$afiliado->Apellido1}}</td>
  		<td>{{$afiliado->Apellido2}}</td>
        <td>{{$afiliado->Telefono}}</td>
  		<td>{{$afiliado->email}}</td>
        <td>{{$afiliado->Direccion}}</td>
  		<td>{{$afiliado->Fecha_Ingreso}}</td>
        <td>{{$afiliado->Num_Cuenta}}</td>
		<td>{{$afiliado->Genero->descripcion}}</td>
		<td>{{@$afiliado->Estado_Civil->descripcion}}</td>
		<td>{{$afiliado->Estado->Descripcion}}</td>  		
			
	
   
  		<td>
			<a href="{{URL::action('AfiliadoController@edit',$afiliado->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$afiliado->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
  		</td>

  	</tr>
		@include('Afiliado.modal')
  	@endforeach
	


</table>

	</div>
	</div>
</div>
