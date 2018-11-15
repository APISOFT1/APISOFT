@extends ('layouts.admin')
@section ('contenido')


		{!!Form::model($usuario,['method'=>'PATCH','route'=>['Usuario.update',$usuario->id]])!!}
            {{Form::token()}}
         
		
			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

				<div class="col-md-6">
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$usuario->name}}"  name="name" value="{{ old('name') }}" required autofocus  >

					@if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>
			</div>
           
          
            <div class="form-group">
            	<label for="Apellido1">Primer apellido</label>
				<input type="text" name="Apellido1" class="form-control" value="{{$usuario->Apellido1}}" placeholder="Apellido1..." />
            </div>
            <div class="form-group">
            	<label for="Apellido2">Segundo apellido</label>
				<input type="text" name="Apellido2" class="form-control"  value="{{$usuario->Apellido2}}" placeholder="Apellido2..." />
            </div>
            <div class="form-group">
            	<label for="Telefono">Telefono</label>
				<input type="text" name="Telefono" class="form-control"  value="{{$usuario->Telefono}}" placeholder="Telefono..." />
            </div>
            
            <div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

				<div class="col-md-6">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$usuario->email}}" name="email" value="{{ old('email') }}"   required>

					@if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>
            <div class="form-group">
            	<label for="Direccion">Direccion</label>
				<input type="text" name="Direccion" class="form-control"  value="{{$usuario->Direccion}}" placeholder="Direccion..." />
            </div>
			<div class="form-group">
            	<label for="Fecha_Ingreso">Fecha Ingreso</label>
				<input type="date" name="Fecha_Ingreso" class="form-control"  value="{{$usuario->Fecha_Ingreso}}" placeholder="YYYY-MM-DD" />
            </div>
			<div class="form-group row">
				<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

				<div class="col-md-6">
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  value="{{$usuario->password}}" name="password" required>

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
<<<<<<< HEAD

                  <div class="form-group">
					{!! Form::label('fechaingreso','FechaIngreso') !!}
					{!! Form::date_add('fechaingreso', $user->fecha_ingreso,['class' =>'form-control', 'placeholder' =>'Fecha Ingreso','required'])!!}
=======
            </div>
			<div class="form-group">
            	<div class="col-md-6">
				<label for="Rol_Id">Rol</label>
					<select class="form-control" id="Rol_Id" name="Rol_Id">
						@foreach ($Rols as $Rol)
							<option value="{{ $Rol->id}}">{{ $Rol->descripcion}}</option>
						@endforeach						
					</select>
>>>>>>> develop
				</div>
            </div>
            
            <div class="form-group">
			<div class="col-md-6">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
<<<<<<< HEAD

                <div class="form-group">
					{!! Form::label('genero','Genero') !!}
					{!! Form:: select('genero',[''=>'Seleccione el genero'  ,'1' => 'Mujer','2'=>'Hombre'], $user->Genero_Id, ['class'=>'form-control']) !!}
				</div>

                <div class="form-group">
					{!! Form::label('rol','Rol') !!}
					{!! Form:: select('rol',[''=>'Seleccione tipo de Rol'  ,'1' => 'Administrador','2'=>'Usuario'], $user->Rol_Id, ['class'=>'form-control']) !!}
				</div>

				
				<div class="form-group">
					{!! Form::submit('Actualizar', ['class' =>'btn btn-primary']) !!}
					
				</div>


			    
			{!! Form::close() !!}

			


			
@endsection			

			
=======
            </div>
			</div>
			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection
>>>>>>> develop
