@extends ('layouts.principalUbicacion') 

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
EATAÑON CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 >LISTADO DE ESTAÑON</h1>

<!-- Saltos de linea-->
<br>
<br>
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->
<div class="absolute3">
@include('Estanon.search') 
		
</div>	

<div class="row">
  <div class="table table-responsive">
  @include('Estanon.search')
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">No</th>
        <th  width="150px">Descripción</th>
        <th  width="150px">Peso</th>
        <th width="200px">
          <a href="#" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($estanon as $value)
        <tr class="estanon{{$value->id}}">
          <td>{{ $no++ }}</td>
          <td>{{ $value->Descripcion }}</td>
          <td>{{ $value->Peso }}</td>
          <td>
            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-Descripcion="{{$value->Descripcion}}" data-Peso="{{$value->Peso}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-Descripcion="{{$value->Descripcion}}" data-Peso="{{$value->Peso}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-Descripcion="{{$value->Descripcion}}" data-Peso="{{$value->Peso}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$estanon->links()}}
</div>
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-descripcion  text-center"></h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">

          <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control has-feedback-left" id="Descripcion" name="Descripcion"
              placeholder="Ubicación" required>

                 <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control has-feedback-left" id="Peso" name="Peso"
              placeholder="Peso" required>
              
              <p class="error text-center alert alert-danger hidden"></p>
              <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit" id="add">
              <span class="fa fa-save"></span>Guardar
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="fa fa-times"></span>Cerrar
            </button>
          </div>
    </div>
  </div>
</div></div>
{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="">Código :</label>
                      <b id="i3"/>
                    </div>
                    <div class="form-group">
                      <label for="">Descripción:</label>
                      <b id="d3"/>
                    </div>
                      <div class="form-group">
                      <label for="">Peso:</label>
                      <b id="pe2"/>
                    </div>
                    </div>
                    </div>
                  </div>
</div>
{{-- Modal Form Edit and Delete Post --}}
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:	#fff">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="modal-descripcion text-center" ></h1>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">

          <div class="form-group">
          <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control has-feedback-left" id="ids" disabled>
              <span class="fa fa-archive form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>
          <div class="form-group">
          <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
            <input type="name" class="form-control  has-feedback-left" id="des">
            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>
           <div class="form-group">
          <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
            <input type="name" class="form-control  has-feedback-left" id="pes">
            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          ¿Esta seguro de eliminar? <span class="descripcion"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="fa fa-times"></span>close
        </button>
      </div>
    </div>
  </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
    </script>