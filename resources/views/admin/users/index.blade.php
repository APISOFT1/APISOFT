@extends ('layouts.principalUser')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'addApiario')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  ROL CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 class="text-center">LISTADO DE  USER</h1>

<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->
<div class="absolute3">

</div>

<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
            <table class="table table-bordered" id="table">
      <tr>
			<th width="150px" >Cedula</th>
  		<th> <div class="size2">Nombre</th>
  		<th>email</th>
  		<th>Correo</th>
    	<th>Direccion</th>
  		<th>FechaIngreso</th>
          <th >
          <a href="#" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
         <tr>
       
          {{ csrf_field() }}
                @foreach ($users as $value)
                     <tr data-entry-id="{{ $value->id }}">
                                <td></td>

                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    @foreach ($value->roles()->pluck('name') as $role)
                                        <span class="label label-info label-many">{{ $role }}</span>
                                    @endforeach
                                 
                                </td>
                                <td>
            <a href="#" class="show-modal btn btn-info btn-sm" 
            data-id="{{$value->id}}"
            data-Nombre="{{$value->name}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm"
            data-id="{{$value->id}}"
            data-Nombre="{{$value->name}}"
            data-email="{{$value->email}}"
            data-email="{{$value->password}}"
            data-apellido1="{{$value->Apellido1}}"
            data-apellido2="{{$value->Apellido2}}"
            data-Telefono="{{$value->Telefono}}"
            data-Direccion="{{$value->Direccion}}"
            data-Fecha_Ingreso="{{$value->Fecha_Ingreso}}"
            data-genero_id="{{$value->Genero->descripcion}}"
            data-estado_id="{{$value->estado_id}}"><i class="glyphicon glyphicon-pencil"></i> </a>

            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-title="{{$value->name}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$users->links()}}
</div>
{{-- Modal Form Create Afiliado --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-crear"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">

          <div class="form-group row add">
          <div class="form-group">
      <label class="control-label col-sm-2" for="email">Cedula</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="Id_Usuario" placeholder="Enter email" name="email">
      </div>
    </div>
    
   
			<div class="form-group row add">
            	<label for="id">Cedula</label>
            	<input type="text" name="id" class="form-control" placeholder="Id_Usuario...">
            </div>
			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

				<div class="col-md-6">
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

					@if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>
			</div>
           
          
            <div class="form-group row add">
            	<label for="Apellido1">Primer apellido</label>
				<input type="text" name="Apellido1" class="form-control" placeholder="Apellido1..." />
            </div>
            <div class="form-group row add">
            	<label for="Apellido2">Segundo apellido</label>
				<input type="text" name="Apellido2" class="form-control" placeholder="Apellido2..." />
            </div>
            <div class="form-group row add">
            	<label for="Telefono">Telefono</label>
				<input type="text" name="Telefono" class="form-control" placeholder="Telefono..." />
            </div>
            
            <div class="form-group row add">
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

				<div class="col-md-6">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

					@if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>
            <div class="form-group row add">
            	<label for="Direccion">Direccion</label>
				<input type="text" name="Direccion" class="form-control" placeholder="Direccion..." />
            </div>
            <div class="form-group row add">
            	<label for="Fecha_Ingreso">Fecha Ingreso</label>
				<input type="date" name="Fecha_Ingreso" class="form-control" placeholder="YYYY-MM-DD" />
            </div>
			<div class="form-group row">
				<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

				<div class="col-md-6">
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

					@if ($errors->has('password'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

				<div class="col-md-6">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
				</div>
			</div>
            
            <div class="form-group row add">
            	<div class="col-md-6">
				<label for="Genero_Id">Genero</label>
					<select class="form-control" id="Genero_Id" name="Genero_Id">
						@foreach ($generos as $Genero)
							<option value="{{ $Genero->id }}">{{ $Genero->descripcion }}</option>
						@endforeach						
					</select>
				</div>


               

                <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('roles', 'Roles*', ['class' => 'control-label']) !!}
                    {!! Form::select('roles[]', $roles, old('roles'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('roles'))
                        <p class="help-block">
                            {{ $errors->first('roles') }}
                        </p>
                    @endif
                </div>
            </div>
            
			<div class="form-group row add">
            	<div class="col-md-6">
				<label for="estado_id">Estado</label>
	
				<div class="register-switch">
      <input type="radio" name="estado_id" value="{{$estado_id=1}}" id="estado_id" class="register-switch-input" checked>
      <label for="estado_id" class="register-switch-label">Activo</label>
      <input type="radio" name="estado_id" value="{{$estado_id=0}}" id="estado_id" class="register-switch-input">
      <label for="estado_id" class="register-switch-label">Inactivo</label>
	</div> 
		
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span>Guardar Afiliado
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Cerrar
            </button>
          </div>
    </div>
  </div>
{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-show"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="iii">ID :</label>
                      <b id="iaa"/>
                    </div>
                    <div class="form-group">
                      <label for="">Nombre :</label>
                      <b id="jaja"/>
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
              <input type="text" class="form-control" id="i" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="Nombre">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="n" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="apellido1">Primer Apellido</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="a1">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="apellido2">Segundo Apellido</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="a2">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="Telefono">Telefono</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="t" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="email">Correo</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="em" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="Direccion">Direccion</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="d" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="Fecha_Ingreso">Fecha Ingreso</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="f">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="Num_cuenta">Numero de Cuenta</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nu" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="genero_id">Genero</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="g" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="estado_civil_id">Estado Civil</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="e" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="estado_id">Estado</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="es" >
            </div>
          </div>

        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Desea Eliminar Este Afiliado <span class="descripcion"></span>?
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