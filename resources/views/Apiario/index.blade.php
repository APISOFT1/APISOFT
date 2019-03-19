@extends ('layouts.principalApiario')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'addApiario')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  APIARIO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 class="text-center">LISTADO DE  APIARIOS</h1>

<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

@can('Crear Afiliado')

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
					<th><a href="#"
					class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i></th>
				</thead>
        {{ csrf_field() }}
           <?php  $no=1; ?>
               @foreach ($api as $value)
					<tr class="api{$value->id}}">
          <td>{{ $no++ }}</td>
					<td>{{ $value->Descripcion}}</td>
					<td>{{ $value->cantidad}}</td>
            <td>{{ $value->ubicacion->Descripcion}}</td>
					<td>
					<a href="#" class="show-modal btn btn-info btn-sm"
					 data-id="{{$value->id}}" 
					 data-Descripcion="{{$value->Descripcion}}"
					 data-cantidad="{{$value->cantidad}}"
					 data-ubicacion_id="{{$value->ubicacion_id}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" 
						data-id="{{$value->id}}"
					 data-Descripcion="{{$value->Descripcion}}"
					 data-cantidad="{{$value->cantidad}}"
					 data-ubicacion_id="{{$value->ubicacion_id}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm"
						 data-id="{{$value->id}}"
						  data-title="{{$value->Descripcion}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$api->links()}}
</div>
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-descripcion"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">

          <div class="form-group row add">
            <label class="control-label col-sm-2" for="Descripcion">Descripcion :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Descripcion" name="Descripcion"
              placeholder="Your Title Here" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

					<div class="form-group row add">
            <label class="control-label col-sm-2" for="cantidad">Cantidad:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="cantidad" name="cantidad"
              placeholder="Ingrese cantidad" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
					<div class="form-group row add">
        
          <label class="control-label col-sm-2" for="ubicacion_id">Ubicacion</label>
          <div class="col-sm-10">
					<select class="form-control" id="ubicacion_id" name="ubicacion_id">
          <option value="">Seleccione</option>
						@foreach ($ubicaciones as $ubicacion)
							<option value="{{ $ubicacion->id }}">{{ $ubicacion->Descripcion }}</option>
						@endforeach						
					</select>
            </div>
          </div>

        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span>Guardar Apiario
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Cerrar
            </button>
          </div>
    </div>
  </div>
</div></div>
{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="">ID :</label>
                      <b id="i2"/>
                    </div>
                    <div class="form-group">
                      <label for="">Descripcion :</label>
                      <b id="d2"/>
                    </div>
										<div class="form-group">
                      <label for="">Cantidad :</label>
                      <b id="ca2"/>
                    </div>
										<div class="form-group">
                      <label for="">Ubicacion :</label>
                      <b id="ub2"/>
                    </div>
                    </div>
                    </div>
                  </div>
</div>
{{-- Modal Form Edit and Delete Post --}}
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-descripcion"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">

          <div class="form-group">
            <label class="control-label col-sm-2"for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ids" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="Descripcion">Descripcion</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="cri">
            </div>
          </div>

					<div class="form-group">
            <label class="control-label col-sm-2"for="cantidad">Cantidad</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="can">
            </div>
          </div>

					<div class="form-group">
            <label class="control-label col-sm-2"for="ubicacion_id">Ubicacion</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="ub">
            </div>
          </div>

        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Are You sure want to delete <span class="descripcion"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>
      </div>
    </div>
  </div>
</div>

@else
                            Usted no tiene los permisos suficientes 
                        @endcan
@endsection