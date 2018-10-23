@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Afiliado Apiario</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'Apiario','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="Descripcion">Descripcion</label>
            	<input type="text" name="Descripcion" class="form-control" placeholder="Descripcion...">
            </div>
           
            <div class="form-group">
            	<label for="cantidad">Cantidad</label>
				<input type="text" name="cantidad" class="form-control" placeholder="cantidad" />
            </div>
            
            
            <div class="form-group">
            	<div class="col-md-6">
				<label for="ubicacion_id">Ubicacion</label>
					<select class="form-control" id="ubicacion_id" name="ubicacion_id">
						@foreach ($ubicaciones as $ubicacion)
							<option value="{{ $ubicacion->id }}">{{ $ubicacion->Descripcion }}</option>
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