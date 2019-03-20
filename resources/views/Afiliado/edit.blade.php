@extends ('layouts.admin')
@section ('contenido')
	
            {!!Form::model($afiliado,['method'=>'PATCH','route'=>['Afiliado.update',$afiliado->id]])!!}
            {{Form::token()}}
         
           
            <div class="form-group">
            	<label for="Nombre">Nombre</label>
            	<input type="text" name="Nombre" class="form-control" value="{{$afiliado->Nombre}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="apellido1">Primer apellido</label>
				<input type="text" name="apellido1" class="form-control" value="{{$afiliado->apellido1}}" placeholder="Apellido1..." />
            </div>
            <div class="form-group">
            	<label for="apellido2">Segundo apellido</label>
				<input type="text" name="apellido2" class="form-control" value="{{$afiliado->apellido2}}" placeholder="Apellido2..." />
            </div>
            <div class="form-group">
            	<label for="Telefono">Telefono</label>
				<input type="text" name="Telefono" class="form-control" value="{{$afiliado->Telefono}}" placeholder="Telefono..." />
            </div>
            
            <div class="form-group">
            	<label for="email">Correo</label>
				<input type="text" name="email" class="form-control"value="{{$afiliado->email}}" placeholder="email..." />
            </div>
            <div class="form-group">
            	<label for="Direccion">Direccion</label>
				<input type="text" name="Direccion" class="form-control" value="{{$afiliado->Direccion}}" placeholder="Direccion..." />
            </div>
			<div class="form-group">
            	<label for="Fecha_Ingreso">Fecha Ingreso</label>
				<input type="date" name="Fecha_Ingreso" class="form-control" value="{{$afiliado->Fecha_Ingreso}}"  placeholder="YYYY-MM-DD" />
            </div>
			<div class="form-group">
            	<label for="Num_Cuenta">Numero cuenta</label>
				<input type="text" name="Num_Cuenta" class="form-control" value="{{$afiliado->Num_Cuenta}}" placeholder="Num_Cuenta..." />
            </div>
            
			<div class="form-group">
            	<div class="col-md-6">
				<label for="genero_id">Genero</label>
					<select class="form-control" id="genero_id" name="genero_id">
						@foreach ($Generos as $Genero)
							<option value="{{ $Genero->id }}">{{ $Genero->descripcion }}</option>
						@endforeach						
					</select>
				</div>
            </div>
			<div class="form-group">
            	<div class="col-md-6">
				<label for="estado_civil_id">Estado Civil</label>
					<select class="form-control" id="estado_civil_id" name="estado_civil_id">
						@foreach ($Estados as $estado)
							<option value="{{ $estado->id}}">{{ $estado->descripcion}}</option>
						@endforeach						
					</select>
				</div>
            </div>
            
            <div class="form-group">
            	<div class="col-md-6">
				<label for="estado_id">Estado</label>
					<select class="form-control" id="estado_id" name="estado_id">
						@foreach ($estados as $Estado)
							<option value="{{ $Estado->id}}">{{ $Estado->Descripcion}}</option>
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