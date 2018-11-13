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

			{!!Form::open(array('url'=>'AfiliadoApiario','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
           
           
            
            <div class="form-group">
            	<div class="col-md-6">
				<label for="afiliado_id">Afiliado</label>
					<select class="form-control" id="afilado_id" name="afiliado_id">
						@foreach ($Afiliados as $afiliado)
							<option value="{{ $afiliado->id }}">{{ $afiliado->Nombre}} {{$afiliado->Apellido1}} {{$afiliado->Apellido2}}</option>
						@endforeach						
					</select>
				</div> 
            </div>

            <div class="form-group">
            	<div class="col-md-6">
				<label for="apiario_id">Apiario</label>
					<select class="form-control" id="apiario_id" name="apiario_id">
						@foreach ($Apiarios as $apiario)
							<option value="{{ $apiario->id }}">{{ $apiario->Descripcion}}</option>
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