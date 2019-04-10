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



<!--Esta clase nos permite posicionar el buscador  -->

		@include('Apiario.search') 


<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
					<th>Descripción</th>
					<th>Cantidad</th>
					<th>Ubicación</th>
          <th> Creado</th>
          <th> Actualizado</th>
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
            <td><span class="label label-success">{{ $value->ubicacion->Descripcion}}</span></td>
            <td >{{$value->created_at}} ({{$value->created_at->diffForHumans()}})</td>
            <td >{{$value->updated_at}} ({{$value->updated_at->diffForHumans()}})</td>
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
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="Descripcion" name="Descripcion" placeholder="Descripción" required>
            <p class="No Ingreso la Descripcion"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>

                <div class="form-group row add">
                <div class="col-md-9" >
           <input type="text" class="form-control has-feedback-left" id="cantidad" name="cantidad" placeholder="cantidad" required>
            <p class="No Ingreso la Cantidad"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
               </div>

                <div class="form-group row add">
                <div class="col-md-9  form-group has-feedback">
        <select name="ubicacion_id" class="form-control has-feedback-left" id="ubicacion_id">
         <option value="">-- Seleccione ubicación --</option>
         @foreach ($ubicaciones as $ubicacion)
          <option value="{{ $ubicacion->id }}">{{$ubicacion->Descripcion}}</option>
         @endforeach
        </select>
        <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
        </div>
        </div>
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="fa fa-save"></span> Guardar 
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="fa fa-times"></span> Cerrar
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

        <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="ids" disabled>
              <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>
          
                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="cri" >
              <span class="fa fa-archive form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>
          
                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="can" >
              <span class="fa fa-archive form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>

                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
        <select name="name" class="form-control has-feedback-left" id="ub">
         <option value="">-- Select ubicacion --</option>
         @foreach ($ubicaciones as $ubicacion)
          <option value="{{ $ubicacion->id }}">{{$ubicacion->Descripcion}}</option>
         @endforeach
        </select>
					  <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
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
      <button class="btn btn-warning" type="submit" id="add">
              <span class="fa fa-pencil"></span> Editar 
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="fa fa-times"></span> Cerrar
            </button>
      </div>
    </div>
  </div>
</div>



@endsection

