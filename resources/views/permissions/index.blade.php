@extends ('layouts.principalPermissions')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'addApiario')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  PERMISO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 class="text-center">LISTADO DE  PERMISOS</h1>



<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->
<div class="absolute3">

</div>

<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				
                    <th>Código </th>
                    <th> Permiso</th>
					<th><a href="#" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
         <tr>
                
                
                {{ csrf_field() }}
                        @foreach ($permissions as $value)
                            <tr data-entry-id="{{ $value->id }}">
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                              
                                <td>
                                <a href="#" class="show-modalRol btn btn-info btn-sm" 
                                data-id="{{$value->id}}" 
                                data-title="{{$value->name}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modalRol btn btn-warning btn-sm"
             data-id="{{$value->id}}"
              data-title="{{$value->name}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modalRol btn btn-danger btn-sm"
             data-id="{{$value->id}}" 
             data-title="{{$value->name}}">
              <i class="glyphicon glyphicon-trash"></i>
          </td>
        </tr>
       
      @endforeach
    </table>
  </div>
  
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
       
    <div class="form-group ">
            	<div class="col-md-6">
                {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
          </div>
          </div>
</div>
</div>
    
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span>Guardar Permiso
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
                      <label for="id">ID :</label>
                      <b id="i22"/>
                    </div>
                    <div class="form-group">
                      <label for="name">Descripcion :</label>
                      <b id="d22"/>
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
            <label class="control-label col-sm-2"for="name">Descripcion</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="cri">
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