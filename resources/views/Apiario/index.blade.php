@extends ('layouts.principal')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  APIARIO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 class="text-center">LISTADO DE  APIARIOS<a href="Apiario/create"></h1>
<div class="absolute">
<button class="btn btn-primary" >+ Crear Nuevo APIARIO</button></a>

</div>
<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->
<div class="absolute3">
		@include('Apiario.search') 
</div>

<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Descripcion</th>
					<th>Cantidad</th>
					<th>Ubicacion</th>
                    <th>Creacion</th>
					<th>Accion</th>
				</thead>

               @foreach ($apiarios as $apiario)
			   <tbody>
					<td>{{ $apiario->id}}</td>
					<td>{{ $apiario->Descripcion}}</td>
					<td>{{ $apiario->cantidad}}</td>
                    <td>{{ $apiario->ubicacion->Descripcion}}</td>
					<td>{{ $apiario->created_at}}</td>

					<td>
					<a href=""  > <button class="btn btn-info btn-sm" > <span class="glyphicon glyphicon-eye-open"></button></a>
						<a href="{{URL::action('ApiarioController@edit',$apiario->id)}}"><Button  class="btn btn-success btn-lg btn-sm">
      <span class="glyphicon glyphicon-edit "></button></a>
                         <a href="" data-target="#modal-delete-{{$apiario->id}}" data-toggle="modal"><button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove "></button></a>
					</td>
				</tbody>
		@endforeach
		@include('Apiario.modal')
	</table>
@endsection