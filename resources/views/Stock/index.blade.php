@extends ('layouts.principalStock') 

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />


	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->

    <link href="{{ url('assets2/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{ url('assets2/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets2/css/demo.css" rel="stylesheet" />




<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'AddStock')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  REGISTRO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')

@include('Busqueda.search',['url'=>'Stock','link'=>'Stock'])

<h1 >LISTADO DE INVENTARIO</h1>

<!-- Saltos de linea-->
<br>
<br>
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->


<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">No</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Presentaciòn</th>
        <th>recepción-estañon</th>
        <th class="text-center" width="150px">
          <a href="#" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      {{ csrf_field() }}
     
      @foreach ($sto as $value)
        <tr class="sto{{$value->id}}">
       <td>{{ $value->id }}</td>
          <td>{{ $value->producto_id }}-{{ $value->producto->nombre}}</td>
          <td>{{ $value->precioUnitario }}</td>
          <td>{{ $value->presentacion_id }}-{{ $value->presentacion->Descripcion}}</td>
          <td>{{ $value->cantidadDisponible }}</td>
          <td>{{ $value->estanon_recepcions_id }}</td>
          <td>
            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" 
            data-producto_id="{{$value->producto_id}}-{{ $value->nombre }}"
            data-precioUnitario="{{$value->precioUnitario}}" 
            data-presentacion_id="{{$value->presentacion_id}}-{{ $value->Descripcion}}"
            data-cantidadDisponible="{{$value->cantidadDisponible}}"
            data-estanon_recepcions_id="{{$value->estanon_recepcions_id}}"> <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" 
             data-producto_id="{{$value->producto_id}}-{{ $value->nombre }}"
            data-precioUnitario="{{$value->precioUnitario}}" 
            data-presentacion_id="{{$value->presentacion_id}}-{{ $value->Descripcion}}"
            data-cantidadDisponible="{{$value->cantidadDisponible}}" 
            data-estanon_recepcions_id="{{$value->estanon_recepcions_id}}">

              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" 
            data-observacion="{{$value->producto_id}}-{{ $value->nombre }}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$sto->links()}}
</div>
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-descripcion text-center"></h4>
      </div>
      <div class="modal-body">
      <span id="form_result"></span>
        <form class="form-horizontal" role="form">

              <div class="form-group row add">
              <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
              <select name="producto_id" class="form-control has-feedback-left" id="producto_id">
              <option value="">-- Seleccione producto --</option>
              @foreach ($producto as $productos)
                <option value="{{ $productos->id }}">{{$productos->nombre}}</option>
              @endforeach
              </select>
              </div>
              </div>

      
                <div class="form-group row add">
                <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" id="precioUnitario" name="precioUnitario" placeholder="Precio" required>
                <p class="error text-center alert alert-danger hidden"></p>
               </div>
                </div>

                <div class="form-group row add">
                <div class="col-md-9  form-group has-feedback">
                <select name="presentacion_id" class="form-control has-feedback-left" id="presentacion_id">
                <option value="">-- Seleccione presentación --</option>
                @foreach ($presentacion as $pre)
                  <option value="{{ $pre->id }}">{{$pre->Descripcion}}</option>
                @endforeach
                </select>
                </div>
                </div>
      
                <div class="form-group row add">
                <div class="col-md-9" >
                <input type="text" class="form-control has-feedback-left" id="cantidadDisponible" name="cantidadDisponible" placeholder="Cantidad" required>
               <p class="error text-center alert alert-danger hidden"></p>
                </div>
                </div>


                <div class="form-group row add">
              <div class="col-md-9  form-group has-feedback">
            <select name="estanon_recepcions_id" class="form-control has-feedback-left" id="estanon_recepcions_id">
            <option value="">-- Seleccione estañon-recepciòn --</option>
            @foreach ($recepcionEst as $rec)
              <option value="{{ $rec->id }}">{{$rec->id}}</option>
            @endforeach
            </select>
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
          <h4 class="modal-title text-center">
          <i class="glyphicon glyphicon-info-sign"></i></h4>
                  </div>
                    <div class="modal-body">
                    <span id="form_result"></span>
                    <div class="form-group">
                      <label for="">Código :</label>
                      <b id="id3"/>
                    </div>
                    <div class="form-group">
                      <label for="">Producto :</label>
                      
                      <b id="pro3"/>
                     
                    </div>
										<div class="form-group">
                      <label for="">Precio:</label>
                      <b id="pre3"/>
                     
                    </div>
										<div class="form-group">
                      <label for="">Presentacion:</label>
                      <b id="pres3"/>
                     
                    </div>
								 <div class="form-group">
                      <label for="">Cantidad :</label>
                      <b id="can3"/>

                    </div>
                  
                    <div class="form-group">
                      <label for="">estañon-recepciòn :</label>    
                      <b id="est3"/>
                    </div>


                    </div>
                    </div>
                    </div>
                  </div>
</div>
{{-- Modal Form Edit and Delete Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-descripcion text-center"></h4>
      </div>
      <div class="modal-body">
      <span id="form_result"></span>
        <form class="form-horizontal" role="form">

              <div class="form-group row add">
              <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
              <select name="producto_id" class="form-control has-feedback-left" id="producto_id">
              <option value="">-- Seleccione producto --</option>
              @foreach ($producto as $productos)
                <option value="{{ $productos->id }}">{{$productos->nombre}}</option>
              @endforeach
              </select>
              </div>
              </div>

      
                <div class="form-group row add">
                <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" id="precioUnitario" name="precioUnitario" placeholder="Precio" required>
                <p class="error text-center alert alert-danger hidden"></p>
               </div>
                </div>

                <div class="form-group row add">
                <div class="col-md-9  form-group has-feedback">
                <select name="presentacion_id" class="form-control has-feedback-left" id="presentacion_id">
                <option value="">-- Seleccione presentación --</option>
                @foreach ($presentacion as $pre)
                  <option value="{{ $pre->id }}">{{$pre->Descripcion}}</option>
                @endforeach
                </select>
                </div>
                </div>
      
                <div class="form-group row add">
                <div class="col-md-9" >
                <input type="text" class="form-control has-feedback-left" id="cantidadDisponible" name="cantidadDisponible" placeholder="Cantidad" required>
               <p class="error text-center alert alert-danger hidden"></p>
                </div>
                </div>


                <div class="form-group row add">
              <div class="col-md-9  form-group has-feedback">
            <select name="estanon_recepcions_id" class="form-control has-feedback-left" id="estanon_recepcions_id">
            <option value="">-- Seleccione estañon-recepciòn --</option>
            @foreach ($recepcionEst as $rec)
              <option value="{{ $rec->id }}">{{$rec->id}}</option>
            @endforeach
            </select>
            </div>
            </div>
            </form>
          </div>
          
    </div>
  </div>
</div></div>
        </form>
        {{-- Form Delete Post --}}
        <div class="deleteContent">
        ¿Está seguro que desea eliminar este registro?<span class="descripcion"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="fa fa-times"></span>Cerrar
        </button>
      </div>
    </div>
  </div>
</div>


@endsection
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript">
function ConfirmDemo() {
 Alert::success('Se ha creado con exito ')->persistent("Close");
}
</script>