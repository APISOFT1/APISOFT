@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Apiarios <a href="Apiario/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('Apiario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descripcion</th>
					<th>Cantidad</th>
					<th>Ubicacion</th>
                    <th>Creacion</th>


				</thead>
               @foreach ($apiarios as $apiario)
				<tr>
					<td>{{ $apiario->id}}</td>
					<td>{{ $apiario->Descripcion}}</td>
					<td>{{ $apiario->Cantidad}}</td>
                    <td>{{ $apiario->ubicacion->Descripcion}}</td>
					<td>{{ $apiario->created_at}}</td>

					<td>
						<a href="{{URL::action('ApiarioController@edit',$apiario->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$apiario->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('Apiario.modal')
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection