@extends ('layouts.principal')


<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  RECEPCION CREADA CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')


<h1 class="text-center">LISTADO DE  RecepcionMateriaPrima<a href="RecepcionMateriaPrima/create"></h1>
<div class="absolute">
<button class="btn btn-primary" >+ Crear Nueva Recepcion</button></a>

</div>
<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->
<div class="absolute3">
		@include('RecepcionMateriaPrima.search')
	</div>


	<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
					<th>Codigo</th>
					<th>Fecha</th>
					<th>Afiliado</th>
					<th>Usuario</th>
                    <th>Peso Bruto</th>
                    <th>Tipo Entrega</th>
					<th>Numero de muestra</th>
                    <th>Aceptar Materia Prima</th>
					<th>Observacion </th>
				</thead>


               @foreach ($recepcionMateriaPrima as $recepcion)
			   <tbody>
					<td>{{ $recepcion->id}}</td>
                    <td>{{ $recepcion->fecha}}</td>
					<td>{{ $recepcion->user->name}} {{$recepcion->user->Apellido1}} {{$recepcion->user->Apellido2}}</td>
                    <td>{{ $recepcion->afiliado->Nombre}} {{$recepcion->afiliado->Apellido}} {{$recepcion->afiliado->Apellido2}}</td>
					<td>{{ $recepcion->pesoBruto}}</td>
					<td>{{ $recepcion->numero_muestras}}</td>
                    <td>{{ $recepcion->tipoEntrega->Descripcion}}</td>
                    <td>{{ $recepcion->aceptarMatPrima->descripcion}}</td>
					<td>{{ $recepcion->observacion}}</td>

                    
					<td>
						<a href="{{URL::action('RecepcionMateriaPrimaController@edit',$recepcion->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$recepcion->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					</tbody>
					@endforeach
				@include('RecepcionMateriaPrima.modal')
			</table>
@endsection