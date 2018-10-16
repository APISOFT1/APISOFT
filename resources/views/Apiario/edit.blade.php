@extends ('layouts.admin')
@section ('contenido')

	
			{!!Form::model($apiario,['method'=>'PATCH','route'=>['Apiario.update',$apiario->id]])!!}
            {{Form::token()}}
			<div class="form-group">
            	<label for="Descripcion">Descripcion</label>
            	<input type="text" name="Descripcion" class="form-control" value="{{$apiario->Descripcion}}" placeholder="Descripicion...">
            </div>
           
            <div class="form-group">
            	<label for="Cantidad">Cantidad</label>
            	<input type="text" name="Cantidad" class="form-control" value="{{$apiario->Cantidad}}" placeholder="Cantidad...">
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