@extends ('layouts.principal')


<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>




@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  INGRESO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->
@section ('contenido')
<h3>Listado Boletas de Cera en laminas  <a href="IngresoLamina/create"><button class="btn btn-success btn-sm"> <i class="glyphicon glyphicon-plus"></i></h3>

<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre--> 



<!--Esta clase nos permite posicionar el buscador  -->
<div class="absolute3">
		@include('IngresoCera\IngresoLamina.search') 

</div>
		<div class="table-responsive">
		<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Fecha</th>
					<th>Afiliado</th>
					<th>Usuario</th>
					<th>Comprobante</th>
					<th>Tipo de pago</th>
          <th>Total</th>
          <th>Estado</th>
           <th>Opciones</th>
				</thead>
               @foreach ($ingresos as $ing)
				<tr>
					<td>{{ $ing->idingreso_lamina}}</td>
					<td>{{ $ing->fecha_hora}}</td>
					<td>{{ $ing->Nombre.' '. $ing->apellido1.' '.$ing->apellido2}}</td>
					<td>{{ $ing->name.' '. $ing->Apellido1.' '.$ing->Apellido2}}</td>
					<td>{{ $ing->tipo_comprobante.':'.$ing->serie_comprobante.'-'.$ing->idingreso_lamina}}</td>
					<td>{{ $ing->tipo_pago}}</td>
                    <td>{{ $ing->total_venta}}</td>
                    <td>{{ $ing->estado}}</td>

					<td>
						<a href="{{URL::action('IngresoLaminaController@show',$ing->idingreso_lamina)}}"><button class=" btn btn-info btn-sm"><i class="fa fa-eye"></i></button></a>
						 <a href="{{URL::action('IngresoLaminaController@edit',$ing->idingreso_lamina)}}"><button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-print"></i></button></a>
						 <a href="" data-target="#modal-delete-{{$ing->idingreso_lamina}}" data-toggle="modal"><button class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i></button></a>
					</td>
				</tr>
				@include('IngresoCera\IngresoLamina.modal')
				@endforeach
			</table>
		</div>
		{{$ingresos->render()}}
	</div>
</div>

@endsection