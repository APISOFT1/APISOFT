@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Materia Prima <a href="RecepcionMateriaPrima/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('RecepcionMateriaPrima.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
                    <th>Observacion</th>
                    <th>Id</th>
                    <th>Observacion</th>
                    <th>Id</th>
                    <th>Observacion</th>
                    <th>Id</th>
                    <th>Observacion</th>
                    <th>Id</th>
					<th>Observacion</th>
				
				</thead>
               @foreach ($recepcionMateriaPrimas as $recepcionMateriaPrima)
				<tr>
					<td>{{ $recepcionMateriaPrima->id}}</td>
                    <td>{{ $recepcionMateriaPrima->Observacion}}</td>
                    <td>{{ $recepcionMateriaPrima->pesoBruto}}</td>
                    <td>{{ $recepcionMateriaPrima->fecha}}</td>
                    <td>{{ $recepcionMateriaPrima->numero_muestra}}</td>
                    <td>{{ $recepcionMateriaPrima->usuario->name->apellido1->apellido2}}</td>
                    <td>{{ $recepcionMateriaPrima->afiliado->name->apellido1->apellido2}}</td>
                    <td>{{ $recepcionMateriaPrima->entrega->descripcion}}</td>
                    <td>{{ $recepcionMateriaPrima->aceptarMatPrima->descripcion}}</td>

                    
					<td>
						<a href="{{URL::action('RecepcionMateriaPrimaController@edit',$recepcionMateriaPrima->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$recepcionMateriaPrima->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('RecepcionMateriaPrima.modal')
				@endforeach
			</table>
		</div>
		{{$recepcionMateriaPrima->render()}}
	</div>
</div>

@endsection