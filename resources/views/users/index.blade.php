@extends ('layouts.principalUser')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'addUser')
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
@include('users.search') 
</div>

<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
            <table class="table table-bordered" id="table">
      <tr>
			<th width="150px" >Cédula</th>
  		<th> <div class="size2">Usuario</th>
  		<th>Correo</th>
    	<th>Roles</th>
          <th >
          <a href="#" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
         <tr>
       
          {{ csrf_field() }}
                @foreach ($users as $value)
                     <tr data-entry-id="{{ $value->id }}">
                               
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }} {{ $value->Apellido1 }} {{ $value->Apellido2 }}</td>
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
   ><i class="glyphicon glyphicon-pencil"></i> </a>

            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-title="{{$value->name}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
            </a>
          
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$users->links()}}
</div>
{{-- Modal Form Create Afiliado --}}
  <div class="modal fade"  id="create" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-primary modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-crear"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">

			<div class="form-group row">
      <label for="name">Nombre</label>
					<input type="text" name = "name"   class="form-control"  placeholder="Nombre...">
			</div>
           
          
            <div class="form-group row add">
				<label for="email">{{ __('E-Mail Address') }}</label>
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required  placeholder="Correo...">

					@if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
			
		</div>
			<div class="form-group row">
				<label for="password">{{ __('Password') }}</label>

					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="contraseña...">

					@if ($errors->has('password'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif

			</div>

			<div class="form-group row">
				<label for="password-confirm">{{ __('Confirm Password') }}</label>

					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirme Contraseña...">
				</div>
		
  
    <div class="form-group row add">
            	<div class="col-md-6">
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
            <label class="control-label col-sm-2"for="name">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nam" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="email">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="em4" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="password">Password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="pass" >
            </div>
          </div>
         
          <div class="form-group">
         
                    {!! Form::label('roles', 'Roles*', ['class' => 'control-label col-sm-2']) !!}
                    <div class="col-sm-10">
                    {!! Form::select('roles[]', $roles, old('roles'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('roles'))
                        <p class="help-block">
                            {{ $errors->first('roles') }}
                        </p>
                    @endif
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