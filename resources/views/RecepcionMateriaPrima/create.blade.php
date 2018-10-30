@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Recepcion de Materia Prima</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'RecepcionMateriaPrima','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="Observacion">Observacion</label>
            	<input type="text" name="Observacion" class="form-control" placeholder="id...">
            </div>
            <div class="form-group">
            	<label for="Fecha_Ingreso">Fecha</label>
				<input type="date" name="Fecha_Ingreso" class="form-control" placeholder="YYYY-MM-DD" />
            </div>
            <div class="form-group">
            	<label for="numero_muestra">Numero muestra</label>
				<input type="text" name="numero_muestra" class="form-control" placeholder="numero_muestra..." />
            </div>
            <div class="form-group">
            	<label for="pesoBruto">Peso Bruto</label>
				<input type="text" name="pesoBruto" class="form-control" placeholder="Num_Cuenta..." />
            </div>
             
			<div class="form-group">
            	<div class="col-md-6">
				<label for="genero_id">Usuario</label>
					<select class="form-control" id="genero_id" name="genero_id">
						@foreach ($usuarios as $usuario)
							<option value="{{ $usuario->id }}">{{ $usuario->name }} {{ $usuario->Apellido1 }} {{ $usuario->Apellido2 }}</option>
						@endforeach						
					</select>
				</div>
            </div>
            <div class="form-group">
            	<div class="col-md-6">
				<label for="afiliado_id">afiliado</label>
					<select class="form-control" id="afiliado_id" name="afiliado_id">
						@foreach ($afiliados as $afiliado)
							<option value="{{ $afiliado->id }}">{{ $afiliado->name}} {{ $afiliado->Apellido1}}{{ $afiliado->Apellido2}}</option>
						@endforeach						
					</select>
				</div>
            </div>
            <div class="form-group">
            	<div class="col-md-6">
				<label for="tipo_entrega">Tipo Entrega</label>
					<select class="form-control" id="tipo_entrega" name="tipo_entrega">
						@foreach ($tipo_entrega as $entrega)
							<option value="{{ $entrega->id }}">{{ $entrega->descripcion }}</option>
						@endforeach						
					</select>
				</div>
            </div>
            <div class="form-group">
            	<div class="col-md-6">
				<label for="aceptarMatPrima_id">Condicion</label>
					<select class="form-control" id="aceptarMatPrima_id" name="aceptarMatPrima_id">
						@foreach ($aceptarMatPrimas as $aceptarMatPrima)
							<option value="{{ $aceptarMatPrima->id }}">{{ $aceptarMatPrima->descripcion }}</option>
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