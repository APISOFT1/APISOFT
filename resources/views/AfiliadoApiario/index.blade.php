@extends('layouts.Admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Afiliado Apiario <a href="AfiliadoApiario/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('AfiliadoApiario.search')
		</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
  	<th>Codigo</th>
  	<th>Cedula Afiliado</th>
  	<th>Codigo Apiario</th>
    
		
  	

  </thead>

 
  	<tr>
  		@foreach ($afiliadoapiarios as $afiliado )
  		<td>{{$afiliado->id}}</td>
  		<td>{{$afiliado->afiliado->Nombre}} {{$afiliado->afiliado->Apellido1}} {{$afiliado->afiliado->Apellido2}}</td>
      <td>{{$afiliado->apiario_id}}</td>

   
  		<td>
			<a href="{{URL::action('AfiliadoApiarioController@edit',$afiliado->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$afiliado->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
  		</td>

  	</tr>
		@include('AfiliadoApiario.modal')
  	@endforeach
	


</table>

	</div>
	</div>
</div>






@endsection