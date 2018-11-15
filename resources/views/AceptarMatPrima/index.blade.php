@extends('layouts.Admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Materias Prima Aceptada <a href="AcertarMatPrima/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('AcertarMatPrima.search')
		</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
  	<th>Descripcion</th>
  </thead>

 
  	<tr>
  		@foreach ($aceptarMatPrimas as $aceptarMatPrima )
  		<td>{{$aceptarMatPrimas->id}}</td>
  		<td>{{$aceptarMatPrimas->Descripcion}}</td>
 
  		
			
	
   
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
