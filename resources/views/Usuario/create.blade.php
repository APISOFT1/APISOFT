@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Usuario</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'Usuario','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="id">Cedula</label>
            	<input type="text" name="id" class="form-control" placeholder="Id_Usuario...">
            </div>
           
            <div class="form-group">
            	<label for="name">Nombre</label>
            	<input type="text" name="name" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="Apellido1">Primer apellido</label>
				<input type="text" name="Apellido1" class="form-control" placeholder="Apellido1..." />
            </div>
            <div class="form-group">
            	<label for="Apellido2">Segundo apellido</label>
				<input type="text" name="Apellido2" class="form-control" placeholder="Apellido2..." />
            </div>
            <div class="form-group">
            	<label for="Telefono">Telefono</label>
				<input type="text" name="Telefono" class="form-control" placeholder="Telefono..." />
            </div>
            
            <div class="form-group">
            	<label for="email">Correo</label>
				<input type="text" name="email" class="form-control" placeholder="Correo..." />
            </div>
            <div class="form-group">
            	<label for="Direccion">Direccion</label>
				<input type="text" name="Direccion" class="form-control" placeholder="Direccion..." />
            </div>
			<div class="form-group">
            	<label for="Fecha_Ingreso">Fecha Ingreso</label>
				<input type="date" name="Fecha_Ingreso" class="form-control" placeholder="YYYY-MM-DD" />
            </div>
			<div class="form-group">
            	<label for="password">Clave</label>
				<input type="text" name="password" class="form-control" placeholder="Clave..." />
            </div>
            
			<div class="form-group">
            	<div class="col-md-6">
				<label for="genero_id">Genero</label>
					<select class="form-control" id="genero_id" name="Genero_Id">
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
			
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection