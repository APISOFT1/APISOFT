@extends ('layouts.principal')
@section ('contenido')


		{!!Form::model($usuarios,['method'=>'PATCH','route'=>['Usuario.update',$usuarios->id]])!!}
            {{Form::token()}}
         
		
			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

				<div class="col-md-6">
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$usuarios->name}}"  name="name" value="{{ old('name') }}" required autofocus  >

					@if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>
			</div>
           
          
            <div class="form-group">
            	<label for="Apellido1">Primer apellido</label>
				<input type="text" name="Apellido1" class="form-control" value="{{$usuarios->Apellido1}}" placeholder="Apellido1..." />
            </div>
            <div class="form-group">
            	<label for="Apellido2">Segundo apellido</label>
				<input type="text" name="Apellido2" class="form-control"  value="{{$usuarios->Apellido2}}" placeholder="Apellido2..." />
            </div>
            <div class="form-group">
            	<label for="Telefono">Telefono</label>
				<input type="text" name="Telefono" class="form-control"  value="{{$usuarios->Telefono}}" placeholder="Telefono..." />
            </div>
            
            <div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

				<div class="col-md-6">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$usuarios->email}}" name="email" value="{{ old('email') }}"   required>

					@if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>
            <div class="form-group">
            	<label for="Direccion">Direccion</label>
				<input type="text" name="Direccion" class="form-control"  value="{{$usuarios->Direccion}}" placeholder="Direccion..." />
            </div>
			<div class="form-group">
            	<label for="Fecha_Ingreso">Fecha Ingreso</label>
				<input type="date" name="Fecha_Ingreso" class="form-control"  value="{{$usuarios->Fecha_Ingreso}}" placeholder="YYYY-MM-DD" />
            </div>
			<div class="form-group row">
				<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

				<div class="col-md-6">
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  value="{{$usuarios->password}}" name="password" required>

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
            
			<div class="form-group">
            	<div class="col-md-6">
				<label for="Genero_Id">Genero</label>
					<select class="form-control" id="Genero_Id" name="Genero_Id">
						@foreach ($Generos as $Genero)
							<option value="{{ $Genero->id }}">{{ $Genero->descripcion }}</option>
						@endforeach						
					</select>
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
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>

            </div>
			</div>
			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection
