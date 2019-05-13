@extends ('layouts.pricipalEstanon')

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

<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Identificación</th>
					<th>Peso</th>
					<th>Creación</th>
					<th> <a href="Estanon/create"
					class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
			</th>

				</thead>
               @foreach ($estanon as $est)
				<tr>
					<td>{{ $est->id}}</td>
					<td>{{ $est->Peso}}</td>
					<td>{{ $est->created_at}}</td>

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