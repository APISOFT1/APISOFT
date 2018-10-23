@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de ubicacion <a href="Ubicacion/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('Ubicacion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descripción</th>
				
				</thead>
               @foreach ($ubicacion as $r)
				<tr>
					<td>{{ $r->id}}</td>
					<td>{{ $r->Descripcion}}</td>
					<td>
						<a href="{{URL::action('UbicacionController@edit',$r->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$r->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('Ubicacion.modal')
				@endforeach
			</table>
		</div>
		{{$ubicacion->render()}}
	</div>
</div>

@endsection