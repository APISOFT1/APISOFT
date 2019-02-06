@extends ('layouts.principal')
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
            	<label for="fecha">Fecha</label>
				<input type="date" name="fecha" class="form-control"  required="required" placeholder="YYYY-MM-DD" />
            </div>
             
			<div class="form-group">
            	<label for="pesoBruto">Peso Bruto</label>
				<input type="number" name="pesoBruto" class="form-control" placeholder="Peso bruto..." />
            </div>
			<br />
			<div class="form-group">
            	<label for="">Numero muestra</label>
				<input type="number" name="numero_muestras" class="form-control" placeholder="Numero muestra..." />
            
            </div>
			<div class="form-group">
            	<div class="col-md-6">
				<label for="user_id">Responsable</label>
					<select class="form-control" id="user_id" name="user_id">
						@foreach ($users as $user)
							<option value="{{ $user->id }}">{{ $user->name}} {{ $user->Apellido1}} {{ $user->Apellido2}}</option>
						@endforeach						
					</select>
				</div>
            </div>			
		
            <div class="form-group">
            	<div class="col-md-6">
				<label for="afiliado_id">afiliado</label>
					<select class="form-control" id="afiliado_id" name="afiliado_id">
						@foreach ($afiliados as $afiliado)
							<option value="{{ $afiliado->id }}">{{ $afiliado->Nombre}} {{ $afiliado->Apellido1}} {{ $afiliado->Apellido2}}</option>
						@endforeach						
					</select>
				</div>
            </div>
			<br />
			<br />
			<br />
			<br />
			

            <div class="form-group">
            	<div class="col-md-6">
				<label for="tipoEntrega_id">Tipo Entrega</label>
					<select class="form-control" id="tipoEntrega_id" name="tipoEntrega_id">
						@foreach ($tipoEntregas as $entrega)
							<option value="{{ $entrega->id }}">{{ $entrega->Descripcion }}</option>
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
			<br />
			<br />
			<br />

            <div class="form-group">
			
            	<div class="col-md-6">
            	<button class="btn btn-primary" type="submit">Guardar</button> 

            	<button class="btn btn-danger" type="reset">Cancelar</button>
				
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection