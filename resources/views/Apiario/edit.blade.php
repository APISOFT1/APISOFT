@extends ('layouts.admin')
@section ('contenido')

	
			{!!Form::model($apiarios,['method'=>'PATCH','route'=>['Apiario.update',$apiarios->id]])!!}
            {{Form::token()}}
			<div class="form-group">
            	<label for="Descripcion">Descripcion</label>
            	<input type="text" name="Descripcion" class="form-control" value="{{$apiarios->Descripcion}}" placeholder="Descripicion...">
            </div>
           
            <div class="form-group">
            	<label for="cantidad">Cantidad</label>
            	<input type="text" name="cantidad" class="form-control" value="{{$apiarios->cantidad}}" placeholder="Cantidad...">
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