@extends ('layouts.principalCera')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'addCera')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  CERA CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 class="text-center">LISTADO DE  CERA</h1>

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
					<th>Recepcion</th>
					<th>Peso Bruto</th>
                    <th>Peso Neto</th>
                    <th>Fecha</th>
					<th><a href="#"
					class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i></th>
				</thead>
        {{ csrf_field() }}
           <?php  $no=1; ?>
               @foreach ($cera as $value)
					<tr class="api{$value->id}}">
          <td>{{ $no++ }}</td>
					<td>{{ $value->Descripcion}}</td>
					<td>{{ $value->RecepcionMateriaPrima->afiliado->Nombre}}</td>
            <td>{{ $value->PesoBruto}}</td>
            <td>{{ $value->PesoNeto}}</td>
            <td>{{ $value->Fecha}}</td>
					<td>
					<a href="#" class="show-modal btn btn-info btn-sm"
					 data-id="{{$value->id}}" 
					 data-Descripcion="{{$value->Descripcion}}"
					 data-Recepcion_id="{{$value->Recepcion_id}}"
					 data-PesoBruto="{{$value->PesoBruto}}"
                     data-PesoNeto="{{$value->PesoNeto}}"
                     data-Fecha="{{$value->Fecha}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" 
						data-id="{{$value->id}}"
					 data-Descripcion="{{$value->Descripcion}}"
                     data-Recepcion_id="{{$value->Recepcion_id}}"
					 data-PesoBruto="{{$value->PesoBruto}}"
                     data-PesoNeto="{{$value->PesoNeto}}"
                     data-Fecha="{{$value->Fecha}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm"
						 data-id="{{$value->id}}"
						  data-title="{{$value->Descripcion}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
            {!! Form::button('Eliminar', array('type' => 'submit', 'class' => 'btn btn-danger')) !!} 
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$cera->links()}}
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

          <label for="roll">Recepcion <span class="required">*</span></label>
        <select name="Recepcion_id" class="form-control" id="Recepcion_id">
         <option value="">-- Select Recepcion --</option>
         @foreach ($recepciones as $recep)
          <option value="{{ $recep->id }}">{{$recep->id}}</option>
         @endforeach
        </select>

          <div class="form-group row add">
            <label class="control-label col-sm-2" for="PesoBruto">Peso Bruto :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="PesoBruto" name="PesoBruto"
              placeholder="Your Title Here" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="PesoNeto">Peso Neta :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="PesoNeto" name="PesoNeto"
              placeholder="Your Title Here" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="Fecha">Fecha :</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="Fecha" name="Fecha"
              placeholder="Your Title Here" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span>Guardar Extracción
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



@endsection

<script type="text/javascript">
 
  function ConfirmDelete()
  {
    var x = confirm("Estas seguro de Eliminar?");
    if (x)
      return true;
    else
      return false;
  }
 
</script>