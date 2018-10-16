@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Estañones <a href="Estanon/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('Estanon.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Peso</th>
					<th>Fecha</th>
					<th>Creacion</th>

				</thead>
               @foreach ($estanon as $est)
				<tr>
					<td>{{ $est->id}}</td>
					<td>{{ $est->Peso}}</td>
                    <td>{{ $est->Fecha}}</td>
					<td>{{ $est->created_at}}</td>

					<td>
						<a href="{{URL::action('EstanonController@edit',$est->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$est->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('Estanon.modal')
				@endforeach
			</table>
		</div>
		{{$estanon->render()}}
	</div>
</div>

@endsection