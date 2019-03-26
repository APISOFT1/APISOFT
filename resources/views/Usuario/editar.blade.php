<div class="modal fade modal-slide-in-right" id="editarUsuario">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Crear</h4>
            </div>
            
            <div class="modal-body">
			{!!Form::model($usuario,['method'=>'PATCH','route'=>['Usuario.edit',$usuario->id]])!!}
            {{Form::token()}}
         
			<div class="form-group">
            	<label for="id">Cedula</label>
            	<input type="text" name="id" class="form-control" placeholder="Id_Usuario...">
            </div>
			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

				<div class="col-md-6">
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$usuario->name}}" name="name" value="{{ old('name') }}" required autofocus>

					@if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>
			</div>
           
          
            <div class="form-group">
            	<label for="Apellido1">Primer apellido</label>
				<input type="text" name="Apellido1" class="form-control"  value="{{$usuario->Apellido1}}"placeholder="Apellido1..." />
            </div>
            <div class="form-group">
            	<label for="Apellido2">Segundo apellido</label>
				<input type="text" name="Apellido2" class="form-control" value="{{$usuario->Apellido2}}" placeholder="Apellido2..." />
            </div>
            <div class="form-group">
            	<label for="Telefono">Telefono</label>
				<input type="text" name="Telefono" class="form-control" value="{{$usuario->Telefono}}" placeholder="Telefono..." />
            </div>
            
            <div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

				<div class="col-md-6">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"value="{{$usuario->email}}" value="{{ old('email') }}" required>

					@if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>
            <div class="form-group">
            	<label for="Direccion">Direccion</label>
				<input type="text" name="Direccion" class="form-control" value="{{$usuario->Direccion}}" placeholder="Direccion..." />
            </div>
			<div class="form-group">
            	<label for="Fecha_Ingreso">Fecha Ingreso</label>
				<input type="date" name="Fecha_Ingreso" class="form-control" value="{{$usuario->Fecha_Ingreso}}" placeholder="YYYY-MM-DD" />
            </div>
		
			<div class="form-group">
            	<div class="col-md-6">
				<label for="Genero_Id">Genero</label>
					<select class="form-control" id="Genero_Id" name="Genero_Id">
						@foreach ($Generos as $Genero)
							<option value="{{ $Genero->id }}">{{ $Genero->descripcion }}</option>
						@endforeach						
					</select>
				</div>
            </div>
			<div class="form-group">
            	<div class="col-md-6">
				<label for="Rol_Id">Rol</label>
					<select class="form-control" id="Rol_Id" name="Rol_Id">
						@foreach ($Rols as $Rol)
							<option value="{{ $Rol->id}}">{{ $Rol->descripcion}}</option>
						@endforeach						
					</select>
				</div>
            </div>

				<div class="form-group">
            	<div class="col-md-6">
				<label for="Estado_Id">Estado</label>
					<select class="form-control" id="Estado_Id" name="Estado_Id">
						@foreach ($Estados as $Estado)
							<option value="{{ $Estado->id}}">{{ $Estado->Descripcion}}</option>
						@endforeach						
					</select>
				</div>
            </div>
            
		
         <div class="modal-footer">
			
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}	
           
        </div>
    </div>
</div>
